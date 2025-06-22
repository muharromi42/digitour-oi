<?php

namespace App\Http\Controllers;


use App\Models\Umkm;
use App\Models\UmkmData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;


class UmkmController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Cek apakah user adalah admin
            if (Auth::user()->role === 'admin') {
                $data = Umkm::with('user')->latest();
            } else {
                $data = Umkm::with('user')->where('user_id', Auth::id())->latest();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {
                    if ($row->foto) {
                        $fotoPaths = json_decode($row->foto);
                        $count = count($fotoPaths);

                        // Start with a container that will be the gallery
                        $html = '<div class="gallery-' . $row->id . '">';

                        // Show first image as thumbnail
                        $firstImgUrl = asset('storage/' . $fotoPaths[0]);
                        $html .= '<a href="' . $firstImgUrl . '" class="image-popup" title="' . $row->judul . ' (1/' . $count . ')">';
                        $html .= '<img src="' . $firstImgUrl . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">';
                        $html .= '</a>';

                        // Add more badge if there are additional images
                        if ($count > 1) {
                            $html .= '<span class="badge bg-info position-relative" style="top: -15px; left: -10px;">+' . ($count - 1) . '</span>';

                            // Add hidden links for all other images to be accessible in the gallery
                            for ($i = 1; $i < $count; $i++) {
                                $imgUrl = asset('storage/' . $fotoPaths[$i]);
                                $html .= '<a href="' . $imgUrl . '" class="d-none" title="' . $row->judul . ' (' . ($i + 1) . '/' . $count . ')"></a>';
                            }
                        }

                        $html .= '</div>';
                        return $html;
                    }
                    return 'No Image';
                })
                ->addColumn('map', function ($row) {
                    if ($row->map) {
                        return '<a href="' . $row->map . '" target="_blank" class="btn btn-sm btn-info">Lihat Map</a>';
                    }
                    return 'No Map';
                })
                ->addColumn('user', fn($row) => $row->user->name)
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('umkm.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                            <form action="' . route('umkm.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                            </form>';
                })
                ->rawColumns(['foto', 'map', 'action'])
                ->make(true);
        }

        return view('umkm.index');
    }

    public function create()
    {
        return view('umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'waktu_kunjungan' => 'required',
            'alamat' => 'required',
            'map' => 'nullable|url',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $fotoPaths[] = $file->store('umkm', 'public');
            }
        }

        Umkm::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::id(),
            'no_hp' => $request->no_hp,
            'waktu_kunjungan' => $request->waktu_kunjungan,
            'alamat' => $request->alamat,
            'map' => $request->map,
            'foto' => json_encode($fotoPaths),
        ]);

        return redirect()->route('umkm.index')->with('success', 'umkm berhasil ditambahkan!');
    }

    public function edit(Umkm $umkm)
    {
        return view('umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'waktu_kunjungan' => 'required',
            'alamat' => 'required',
            'map' => 'nullable|url',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'no_hp' => $request->no_hp,
            'waktu_kunjungan' => $request->waktu_kunjungan,
            'alamat' => $request->alamat,
            'map' => $request->map,
        ];

        // Get existing photos
        $existingPhotos = json_decode($umkm->foto, true) ?: [];

        // Handle image deletion
        if ($request->has('delete_images')) {
            $deleteIndexes = $request->delete_images;

            // Create a new array without the deleted images
            $updatedPhotos = [];
            foreach ($existingPhotos as $index => $path) {
                if (!in_array($index, $deleteIndexes)) {
                    $updatedPhotos[] = $path;
                } else {
                    // Delete the file from storage if needed
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
            $existingPhotos = $updatedPhotos;
        }

        // Add new photos
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $existingPhotos[] = $file->store('umkm', 'public');
            }
        }

        // If no photos remain and no new ones were uploaded, set to empty array
        $data['foto'] = !empty($existingPhotos) ? json_encode($existingPhotos) : json_encode([]);

        $umkm->update($data);

        return redirect()->route('umkm.index')->with('success', 'umkm berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        $umkm->delete();
        return redirect()->route('umkm.index')->with('success', 'umkm berhasil dihapus!');
    }


    public function umkmdataIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = UmkmData::with('user')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {
                    if ($row->foto) {
                        $fotoPaths = json_decode($row->foto);
                        $count = count($fotoPaths);

                        // Start with a container that will be the gallery
                        $html = '<div class="gallery-' . $row->id . '">';

                        // Show first image as thumbnail
                        $firstImgUrl = asset('storage/' . $fotoPaths[0]);
                        $html .= '<a href="' . $firstImgUrl . '" class="image-popup" title="' . $row->judul . ' (1/' . $count . ')">';
                        $html .= '<img src="' . $firstImgUrl . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">';
                        $html .= '</a>';

                        // Add more badge if there are additional images
                        if ($count > 1) {
                            $html .= '<span class="badge bg-info position-relative" style="top: -15px; left: -10px;">+' . ($count - 1) . '</span>';

                            // Add hidden links for all other images to be accessible in the gallery
                            for ($i = 1; $i < $count; $i++) {
                                $imgUrl = asset('storage/' . $fotoPaths[$i]);
                                $html .= '<a href="' . $imgUrl . '" class="d-none" title="' . $row->judul . ' (' . ($i + 1) . '/' . $count . ')"></a>';
                            }
                        }

                        $html .= '</div>';
                        return $html;
                    }
                    return 'No Image';
                })
                ->addColumn('user', fn($row) => $row->user->name)
                ->addColumn('action', function ($row) {
                    $buttons = '<a href="' . route('umkmdata.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a> ';

                    // Button Approve dan Reject hanya untuk admin
                    if (auth()->check() && auth()->user()->role === 'admin') {
                        // Button Approve - hanya tampil jika status bukan Approve
                        if ($row->approval !== 'Approve') {
                            $buttons .= '<form action="' . route('umkmdata.approve', $row->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            <button type="submit" class="btn btn-sm btn-success approve-button">Approve</button>
                        </form> ';
                        }

                        // Button Reject - hanya tampil jika status bukan Rejected
                        if ($row->approval !== 'Rejected') {
                            $buttons .= '<form action="' . route('umkmdata.reject', $row->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            <button type="submit" class="btn btn-sm btn-secondary reject-button">Reject</button>
                        </form> ';
                        }
                    }

                    // Button Delete
                    $buttons .= '<form action="' . route('umkmdata.destroy', $row->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                </form>';

                    return $buttons;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }
        return view('umkmdata.index');
    }


    public function umkmdataCreate()
    {
        return view('umkmdata.create');
    }

    public function umkmdataCreate2()
    {
        return view('umkmdata.create2');
    }

    public function umkmdataEdit($id)
    {
        $umkmdata = UmkmData::findOrFail($id);

        // Data sudah dalam format JSON dari database, tidak perlu decode di controller

        return view('umkmdata.edit', compact('umkmdata'));
    }

    // Simpan data baru
    public function umkmdataStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama_komersial' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tahun_mulai_beroperasi' => 'required|date_format:Y',
            'total_luas_area' => 'nullable|string',
            'luas_area_wisata' => 'nullable|string',
            'jam_buka' => 'required|string',
            'jam_tutup' => 'required|string',
            'pengunjung_nusantara' => 'nullable|integer',
            'pengunjung_mancanegara' => 'nullable|integer',
            'jenis_produk' => 'nullable|string',
            'harga_produk' => 'nullable|string',
            'dokumen_kapasitas' => 'nullable|string',
            'kapasitas_pengunjung' => 'nullable|integer',
            'pendidikan_label' => 'nullable|string',
            'jumlah_pendidikan' => 'nullable|integer',
            'gender_label' => 'nullable|string',
            'jumlah_gender' => 'nullable|integer',
            'pendapatan' => 'nullable|integer',
            'pengeluaran' => 'nullable|integer',
            'metode_pemesanan' => 'nullable|array',
            'persentase_online' => 'nullable|integer',
            'metode_pembayaran' => 'nullable|array',
            'sarana_promosi' => 'nullable|array',
            'paket_wisata' => 'nullable|in:Ada,Tidak Ada',
            'luas_area_parkir' => 'nullable|string',
            'kapasitas_motor' => 'nullable|integer',
            'kapasitas_mobil' => 'nullable|integer',
            'kapasitas_bus' => 'nullable|integer',
            'jumlah_toilet_umum' => 'nullable|integer',
            'pembagian_toilet' => 'nullable|in:Ada,Tidak Ada',
            'toilet_khusus' => 'nullable|in:Ada,Tidak Ada',
            'prosedur_sop' => 'nullable|in:Ada,Tidak Ada',
            'sop_keamanan_pengunjung' => 'nullable|in:Ada,Tidak Ada',
            'jalur_evakuasi' => 'nullable|in:Ada,Tidak Ada',
            'asuransi_pengunjung' => 'nullable|in:Ada,Tidak Ada',
            'pos_keamanan' => 'nullable|in:Ada,Tidak Ada',
            'kamera_cctv' => 'nullable|in:Ada,Tidak Ada',
            'foodservice' => 'nullable|string',
            'signage' => 'nullable|string',
            'pusat_informasi' => 'nullable|string',
            'kotak_saran' => 'nullable|string',
            'tempat_ibadah' => 'nullable|string',
            'konsep_3r' => 'nullable|string',
            'sistem_pengolahan_limbah' => 'nullable|string',
            'sumberair' => 'nullable|array',
            'sumberair.*' => 'string',
        ]);

        // Konversi array ke JSON untuk kolom JSON di database
        $validatedData['metode_pemesanan'] = json_encode($request->metode_pemesanan);
        $validatedData['metode_pembayaran'] = json_encode($request->metode_pembayaran);
        $validatedData['sarana_promosi'] = json_encode($request->sarana_promosi);
        $validatedData['sumberair'] = json_encode($request->sumberair);
        $validatedData['user_id'] = Auth::id();

        UmkmData::create($validatedData);

        return redirect()->back()->with('success', 'Data UMKM berhasil disimpan.');
    }

    // Update data existing
    public function umkmdataUpdate(Request $request, $id)
    {
        $umkmdata = UmkmData::findOrFail($id);

        // Pastikan user hanya bisa edit data miliknya sendiri (opsional)
        if ($umkmdata->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $validatedData = $request->validate([
            'nama_komersial' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tahun_mulai_beroperasi' => 'required|date_format:Y',
            'total_luas_area' => 'nullable|string',
            'luas_area_wisata' => 'nullable|string',
            'jam_buka' => 'required|string',
            'jam_tutup' => 'required|string',
            'pengunjung_nusantara' => 'nullable|integer',
            'pengunjung_mancanegara' => 'nullable|integer',
            'jenis_produk' => 'nullable|string',
            'harga_produk' => 'nullable|string',
            'dokumen_kapasitas' => 'nullable|string',
            'kapasitas_pengunjung' => 'nullable|integer',
            'pendidikan_label' => 'nullable|string',
            'jumlah_pendidikan' => 'nullable|integer',
            'gender_label' => 'nullable|string',
            'jumlah_gender' => 'nullable|integer',
            'pendapatan' => 'nullable|integer',
            'pengeluaran' => 'nullable|integer',
            'metode_pemesanan' => 'nullable|array',
            'persentase_online' => 'nullable|integer',
            'metode_pembayaran' => 'nullable|array',
            'sarana_promosi' => 'nullable|array',
            'paket_wisata' => 'nullable|in:Ada,Tidak Ada',
            'luas_area_parkir' => 'nullable|string',
            'kapasitas_motor' => 'nullable|integer',
            'kapasitas_mobil' => 'nullable|integer',
            'kapasitas_bus' => 'nullable|integer',
            'jumlah_toilet_umum' => 'nullable|integer',
            'pembagian_toilet' => 'nullable|in:Ada,Tidak Ada',
            'toilet_khusus' => 'nullable|in:Ada,Tidak Ada',
            'prosedur_sop' => 'nullable|in:Ada,Tidak Ada',
            'sop_keamanan_pengunjung' => 'nullable|in:Ada,Tidak Ada',
            'jalur_evakuasi' => 'nullable|in:Ada,Tidak Ada',
            'asuransi_pengunjung' => 'nullable|in:Ada,Tidak Ada',
            'pos_keamanan' => 'nullable|in:Ada,Tidak Ada',
            'kamera_cctv' => 'nullable|in:Ada,Tidak Ada',
            'foodservice' => 'nullable|string',
            'signage' => 'nullable|string',
            'pusat_informasi' => 'nullable|string',
            'kotak_saran' => 'nullable|string',
            'tempat_ibadah' => 'nullable|string',
            'konsep_3r' => 'nullable|string',
            'sistem_pengolahan_limbah' => 'nullable|string',
            'sumberair' => 'nullable|array',
            'sumberair.*' => 'string',
        ]);

        // Konversi array ke JSON untuk kolom JSON di database
        $validatedData['metode_pemesanan'] = json_encode($request->metode_pemesanan);
        $validatedData['metode_pembayaran'] = json_encode($request->metode_pembayaran);
        $validatedData['sarana_promosi'] = json_encode($request->sarana_promosi);
        $validatedData['sumberair'] = json_encode($request->sumberair);

        $umkmdata->update($validatedData);

        return redirect()->back()->with('success', 'Data UMKM berhasil diperbarui.');
    }

    // Hapus data
    public function umkmdataDestroy($id)
    {
        $umkm = UmkmData::findOrFail($id);
        $umkm->delete();

        return redirect()->route('umkmdata.index')->with('success', 'Data umkm berhasil dihapus.');
    }

    public function approve($id)
    {
        // Validasi hanya admin yang bisa approve
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $umkmdata = UmkmData::findOrFail($id);
        $umkmdata->update(['approval' => 'Approve']);

        return redirect()->back()->with('success', 'Data berhasil di-approve');
    }

    public function reject($id)
    {
        // Validasi hanya admin yang bisa reject
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $umkmdata = UmkmData::findOrFail($id);
        $umkmdata->update(['approval' => 'Rejected']);

        return redirect()->back()->with('success', 'Data berhasil di-reject');
    }

    // public function generatePdf()
    // {
    //     $umkmData = umkmData::all();

    //     $pdf = Pdf::loadView('umkmdata.pdf', compact('umkmData'));
    //     return $pdf->download('umkm-data.pdf');
    // }

    public function pdf(Request $request)
    {
        if ($request->ajax()) {
            $data = UmkmData::with('user')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user', fn($row) => $row->user->name)
                ->addColumn('action', function ($row) {
                    $buttons = '<a href="' . route('umkmdata.singlepdf', $row->id) . '" target="_blank" class="btn btn-danger btn-sm">
        <i class="fas fa-file-pdf"></i> PDF
    </a>';

                    return $buttons;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('umkmdata.pdf');
    }

    public function generateSinglePdf($id)
    {
        $umkm = UmkmData::findOrFail($id);

        return Pdf::loadView('umkmdata.single-pdf', compact('umkm'))
            ->setPaper('a4', 'portrait')
            ->download("profil-umkm-{$umkm->id}.pdf");
    }
}
