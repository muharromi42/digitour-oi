<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDataWisata = Wisata::all()->count();

        return view('dashboard', compact('totalDataWisata'));
    }
}
