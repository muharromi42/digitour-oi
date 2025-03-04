<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $news = NewsModel::with('user')->latest();

            return DataTables::of($news)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('news.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('news.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
                              </form>';
                    return $btn;
                })
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('foto', function ($row) {
                    if ($row->foto) {
                        return asset('storage/' . $row->foto); // URL lengkap gambar
                    }
                    return asset('images/no-image.png'); // Placeholder jika foto kosong
                })
                // ->editColumn('foto', function ($row) {
                //     return '<img src="' . asset('storage/' . $row->foto) . '" width="50" alt="Foto">';
                // })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }

        return view('news.index');
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('news_images', 'public');
        }

        NewsModel::create([
            'user_id' => Auth::id(), // Ambil ID user yang login
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('news.index')->with('success', 'News berhasil ditambahkan!');
    }

    // public function edit(NewsModel $news)
    public function edit($id)
    {
        // if (Auth::id() !== $news->user_id) {
        //     abort(403, 'Unauthorized action.');
        // }
        // return view('news.edit', compact('news'));
        $news = NewsModel::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, NewsModel $news)
    {
        if (Auth::id() !== $news->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('news_images', 'public');
            $news->foto = $fotoPath;
        }

        $news->update($request->only(['judul', 'deskripsi', 'tanggal', 'foto']));

        return redirect()->route('news.index')->with('success', 'News berhasil diperbarui!');
    }

    public function destroy(NewsModel $news)
    {
        if (Auth::id() !== $news->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $news->delete();
        return redirect()->route('news.index')->with('success', 'News berhasil dihapus!');
    }
}
