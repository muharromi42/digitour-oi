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
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'no_hp' => $request->no_hp,
            'jam_buka' => $request->jam_buka,
            'kota' => $request->kota,
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
