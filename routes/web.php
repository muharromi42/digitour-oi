<?php

use App\Http\Controllers\BudayaController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index');
// });


// HOMEPAGE
// Route::get('/home', function () {
//     return view('home.index');
// });
Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::prefix('home')->group(function () {
    Route::get('/news', [HomepageController::class, 'news'])->name('home.news');
    // Route::get('/news', [NewsController::class, 'list'])->name('news.list');
    Route::get('/news/{slug}', [HomepageController::class, 'detail'])->name('news.detail');
    // wisata
    Route::get('/wisata', [HomepageController::class, 'wisata'])->name('home.wisata');
    Route::get('/umkm', [HomepageController::class, 'umkm'])->name('home.umkm');
    Route::get('/makanan', [HomepageController::class, 'makanan'])->name('home.makanan');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/news', [NewsController::class, 'index'])->name('news');
    // Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm');
    // Route::get('/makanan', [MakananController::class, 'index'])->name('makanan');
    Route::resource('news', NewsController::class);
    Route::resource('umkm', UmkmController::class);
    Route::resource('makanan', MakananController::class);
    Route::resource('wisata', WisataController::class);
    Route::resource('budaya', BudayaController::class);
    Route::resource('penginapan', PenginapanController::class);

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
    });
});

require __DIR__ . '/auth.php';
