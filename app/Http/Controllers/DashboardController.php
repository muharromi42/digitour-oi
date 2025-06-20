<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\News;
use App\Models\Penginapan;
use App\Models\Umkm;
use App\Models\Wisata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDataWisata = Wisata::all()->count();
        $totalDataNews = News::all()->count();
        $totalDataBudaya = Budaya::all()->count();
        $totalDataUmkm = Umkm::all()->count();
        $totalDataPenginapan = Penginapan::all()->count();

        return view('dashboard', compact('totalDataWisata', 'totalDataNews', 'totalDataBudaya', 'totalDataUmkm', 'totalDataPenginapan'));
    }
}
