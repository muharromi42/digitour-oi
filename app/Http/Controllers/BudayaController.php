<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BudayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Budaya::with('user')->latest();
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
                    return '<a href="' . route('budaya.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                            <form action="' . route('budaya.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                            </form>';
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        return view('budaya.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budaya.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $fotoPaths[] = $file->store('budaya', 'public');
            }
        }

        Budaya::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::id(),
            'foto' => json_encode($fotoPaths),
        ]);

        return redirect()->route('budaya.index')->with('success', 'Budaya berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budaya  $budaya
     * @return \Illuminate\Http\Response
     */
    public function edit(Budaya $budaya)
    {
        return view('budaya.edit', compact('budaya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budaya  $budaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budaya $budaya)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        // Get existing photos
        $existingPhotos = json_decode($budaya->foto, true) ?: [];

        // Handle image deletion
        if ($request->has('delete_images')) {
            $deleteIndexes = $request->delete_images;

            // Create a new array without the deleted images
            $updatedPhotos = [];
            foreach ($existingPhotos as $index => $path) {
                if (!in_array((string)$index, $deleteIndexes)) {
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
                $existingPhotos[] = $file->store('budaya', 'public');
            }
        }

        // If no photos remain and no new ones were uploaded, set to empty array
        $data['foto'] = !empty($existingPhotos) ? json_encode($existingPhotos) : json_encode([]);

        $budaya->update($data);

        return redirect()->route('budaya.index')->with('success', 'Budaya berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budaya  $budaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budaya $budaya)
    {
        // Delete associated images
        if ($budaya->foto) {
            $fotoPaths = json_decode($budaya->foto, true);
            foreach ($fotoPaths as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $budaya->delete();

        return redirect()->route('budaya.index')->with('success', 'Budaya berhasil dihapus!');
    }
}
