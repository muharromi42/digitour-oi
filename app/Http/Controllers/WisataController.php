<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
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
                        $imgUrl = asset('storage/' . json_decode($row->foto)[0]);
                        return '<a href="' . $imgUrl . '" class="image-popup">
                                    <img src="' . $imgUrl . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                </a>';
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
            'kota' => 'required',
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
            'kota' => $request->kota,
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
            'kota' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($wisata->foto) {
                Storage::delete($wisata->foto);
            }

            // Upload foto baru
            $path = $request->file('foto')->store('wisata', 'public');
            $wisata->foto = $path;
        }

        // Update data
        $wisata->update($request->except('foto'));

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil diperbarui');
    }


    // public function edit(Wisata $wisata)
    // {
    //     return view('wisata.edit', compact('wisata'));
    // }

    // public function update(Request $request, Wisata $wisata)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'deskripsi' => 'required',
    //         'no_hp' => 'required',
    //         'jam_buka' => 'required',
    //         'kota' => 'required',
    //         'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $fotoPaths = json_decode($wisata->foto, true);
    //     if ($request->hasFile('foto')) {
    //         foreach ($request->file('foto') as $file) {
    //             $fotoPaths[] = $file->store('wisata', 'public');
    //         }
    //     }

    //     $wisata->update([
    //         'judul' => $request->judul,
    //         'deskripsi' => $request->deskripsi,
    //         'no_hp' => $request->no_hp,
    //         'jam_buka' => $request->jam_buka,
    //         'kota' => $request->kota,
    //         'foto' => json_encode($fotoPaths),
    //     ]);

    //     return redirect()->route('wisata.index')->with('success', 'Wisata berhasil diperbarui!');
    // }

    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil dihapus!');
    }
}
