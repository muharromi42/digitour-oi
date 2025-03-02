<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = NewsModel::where('user_id', auth()->id())->get(); // Hanya ambil data yang terkait dengan user yang login
            return DataTables::of($query_data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $showButton = '<a href="' . route('uploads.edit', $row->id) . '" class="btn btn-primary">Edit</a>';
                    $deleteButton = '<form action="' . route('uploads.destroy', $row->id) . '" method="POST" style="display:inline;" class="delete-form">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger delete-button">Delete</button></form>';
                    if ($row->status == 'rejected') {
                        return $showButton . ' ' . $deleteButton;
                    }
                })
                ->addColumn('status', function ($row) {
                    // Menambahkan card untuk status
                    if ($row->status == 'approved') {
                        return '<div class="card"><div class="card-body"><span class="badge bg-success">Disetujui</span></div></div>';
                    } elseif ($row->status == 'rejected') {
                        return '<div class="card"><div class="card-body"><span class="badge bg-danger">Ditolak</span></div></div>';
                    } else {
                        return '<div class="card"><div class="card-body"><span class="badge bg-warning">Menunggu</span></div></div>';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('news.index');
    }
}
