<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Fetch the 3 most recent news items
        $latestNews = News::with('user')
            ->latest()
            ->take(3)
            ->get();

        return view('home.index', compact('latestNews'));
    }

    public function news()
    {
        $news = News::with('user')->latest()->paginate(5);
        return view('home.news.news', compact('news'));
    }
    // New method to show individual news by slug
    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('home.news.detail', compact('news'));
    }
}
