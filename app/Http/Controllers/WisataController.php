<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Wisatadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Wisata::with('user')->latest();
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
                    return '<a href="' . route('wisata.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                            <form action="' . route('wisata.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                            </form>';
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        return view('wisata.index');
    }

    public function create()
    {
        return view('wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'jam_buka' => 'required',
            'kategori' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $fotoPaths[] = $file->store('wisata', 'public');
            }
        }

        Wisata::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::id(),
            'no_hp' => $request->no_hp,
            'jam_buka' => $request->jam_buka,
            'kategori' => $request->kategori,
            'gmaps' => $request->gmaps,
            'foto' => json_encode($fotoPaths),
        ]);

        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil ditambahkan!');
    }

    public function edit(Wisata $wisata)
    {
        return view('wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'jam_buka' => 'required',
            'kategori' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'no_hp' => $request->no_hp,
            'jam_buka' => $request->jam_buka,
            'kategori' => $request->kategori,
        ];

        // Get existing photos
        $existingPhotos = json_decode($wisata->foto, true) ?: [];

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
                $existingPhotos[] = $file->store('wisata', 'public');
            }
        }

        // If no photos remain and no new ones were uploaded, set to empty array
        $data['foto'] = !empty($existingPhotos) ? json_encode($existingPhotos) : json_encode([]);

        $wisata->update($data);

        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil diperbarui!');
    }



    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil dihapus!');
    }

    public function wisatadataIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = Wisatadata::with('user')->latest();
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
                    return '<a href="' . route('wisatadata.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                            <form action="' . route('wisatadata.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                            </form>';
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }
        return view('wisatadata.index');
    }


    public function wisatadataCreate()
    {
        return view('wisatadata.create');
    }

    public function wisatadataCreate2()
    {
        return view('wisatadata.create2');
    }

    public function wisatadataEdit($id)
    {
        $wisatadata = Wisatadata::findOrFail($id);

        // Data sudah dalam format JSON dari database, tidak perlu decode di controller

        return view('wisatadata.edit', compact('wisatadata'));
    }

    // Simpan data baru
    public function wisatadataStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama_komersial' => 'required|string',
            'tematik_dtw' => 'nullable|array',
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
            'tiket_nusantara' => 'nullable|integer',
            'tiket_mancanegara' => 'nullable|integer',
            'durasi_kunjungan' => 'nullable|string',
            'dokumen_kapasitas' => 'nullable|string',
            'kapasitas_pengunjung' => 'nullable|integer',
            'pendidikan_label' => 'nullable|string',
            'jumlah_pendidikan' => 'nullable|integer',
            'gender_label' => 'nullable|string',
            'jumlah_gender' => 'nullable|integer',
            'pendapatan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'museum_operasional' => 'nullable|array',
            'aktivitas_alam' => 'nullable|array',
            'wisata_alam' => 'nullable|array',
            'wisata_buatan' => 'nullable|array',
            'wisata_tirta' => 'nullable|array',
            'hiburan_rekreasi' => 'nullable|array',
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
            'pembagian_toilet' => 'nullable|string',
            'toilet_khusus' => 'nullable|string',
            'prosedur_sop' => 'nullable|string',
            'sop_keamanan_pengunjung' => 'nullable|string',
            'jalur_evakuasi' => 'nullable|string',
            'asuransi_pengunjung' => 'nullable|string',
            'pos_keamanan' => 'nullable|string',
            'kamera_cctv' => 'nullable|string',
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
        $validatedData['tematik_dtw'] = json_encode($request->tematik_dtw);
        $validatedData['museum_operasional'] = json_encode($request->museum_operasional);
        $validatedData['aktivitas_alam'] = json_encode($request->aktivitas_alam);
        $validatedData['wisata_alam'] = json_encode($request->wisata_alam);
        $validatedData['wisata_buatan'] = json_encode($request->wisata_buatan);
        $validatedData['wisata_tirta'] = json_encode($request->wisata_tirta);
        $validatedData['hiburan_rekreasi'] = json_encode($request->hiburan_rekreasi);
        $validatedData['metode_pemesanan'] = json_encode($request->metode_pemesanan);
        $validatedData['metode_pembayaran'] = json_encode($request->metode_pembayaran);
        $validatedData['sarana_promosi'] = json_encode($request->sarana_promosi);
        $validatedData['user_id'] = Auth::id();

        Wisatadata::create($validatedData);

        return redirect()->back()->with('success', 'Data wisata berhasil disimpan.');
    }

    // Update data existing
    public function wisatadataUpdate(Request $request, $id)
    {
        $wisatadata = Wisatadata::findOrFail($id);

        // Pastikan user hanya bisa edit data miliknya sendiri (opsional)
        if ($wisatadata->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $validatedData = $request->validate([
            'nama_komersial' => 'required|string',
            'tematik_dtw' => 'nullable|array',
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
            'tiket_nusantara' => 'nullable|integer',
            'tiket_mancanegara' => 'nullable|integer',
            'durasi_kunjungan' => 'nullable|string',
            'dokumen_kapasitas' => 'nullable|string',
            'kapasitas_pengunjung' => 'nullable|integer',
            'pendidikan_label' => 'nullable|string',
            'jumlah_pendidikan' => 'nullable|integer',
            'gender_label' => 'nullable|string',
            'jumlah_gender' => 'nullable|integer',
            'pendapatan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'museum_operasional' => 'nullable|array',
            'aktivitas_alam' => 'nullable|array',
            'wisata_alam' => 'nullable|array',
            'wisata_buatan' => 'nullable|array',
            'wisata_tirta' => 'nullable|array',
            'hiburan_rekreasi' => 'nullable|array',
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
            'pembagian_toilet' => 'nullable|string',
            'toilet_khusus' => 'nullable|string',
            'prosedur_sop' => 'nullable|string',
            'sop_keamanan_pengunjung' => 'nullable|string',
            'jalur_evakuasi' => 'nullable|string',
            'asuransi_pengunjung' => 'nullable|string',
            'pos_keamanan' => 'nullable|string',
            'kamera_cctv' => 'nullable|string',
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
        $validatedData['tematik_dtw'] = json_encode($request->tematik_dtw);
        $validatedData['museum_operasional'] = json_encode($request->museum_operasional);
        $validatedData['aktivitas_alam'] = json_encode($request->aktivitas_alam);
        $validatedData['wisata_alam'] = json_encode($request->wisata_alam);
        $validatedData['wisata_buatan'] = json_encode($request->wisata_buatan);
        $validatedData['wisata_tirta'] = json_encode($request->wisata_tirta);
        $validatedData['hiburan_rekreasi'] = json_encode($request->hiburan_rekreasi);
        $validatedData['metode_pemesanan'] = json_encode($request->metode_pemesanan);
        $validatedData['metode_pembayaran'] = json_encode($request->metode_pembayaran);
        $validatedData['sarana_promosi'] = json_encode($request->sarana_promosi);
        $validatedData['sumberair'] = json_encode($request->sumberair);

        $wisatadata->update($validatedData);

        return redirect()->back()->with('success', 'Data wisata berhasil diperbarui.');
    }

    // Hapus data
    public function wisatadataDestroy($id)
    {
        $wisata = Wisatadata::findOrFail($id);
        $wisata->delete();

        return redirect()->route('wisatadata.index')->with('success', 'Data wisata berhasil dihapus.');
    }
}
