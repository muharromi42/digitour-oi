<?php

use App\Http\Controllers\BudayaController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/news/{slug}', [HomepageController::class, 'newsDetail'])->name('news.detail');
    // wisata
    Route::get('/wisata', [HomepageController::class, 'wisata'])->name('home.wisata');
    Route::get('/umkm', [HomepageController::class, 'umkm'])->name('home.umkm');
    Route::get('/makanan', [HomepageController::class, 'makanan'])->name('home.makanan');
    Route::get('/wisata', [HomepageController::class, 'wisata'])->name('home.wisata');
    // Route::get('/wisata', [wisataController::class, 'list'])->name('wisata.list');
    Route::get('/wisata/{id}', [HomepageController::class, 'wisataDetail'])->name('wisata.detail');
    Route::get('/budaya', [HomepageController::class, 'budaya'])->name('home.budaya');
    Route::get('/budaya/{id}', [HomepageController::class, 'budayaDetail'])->name('budaya.detail');
    Route::get('/penginapan', [HomepageController::class, 'penginapan'])->name('home.penginapan');
    Route::get('/penginapan/{id}', [HomepageController::class, 'penginapanDetail'])->name('penginapan.detail');
    Route::get('/umkm', [HomepageController::class, 'umkm'])->name('home.umkm');
    Route::get('/umkm/{id}', [HomepageController::class, 'umkmDetail'])->name('umkm.detail');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD
Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

    Route::get('/userProfile', [UserController::class, 'userProfile'])->name('userProfile');
    // Route khusus untuk wisatadata (CRUD manual)
    Route::get('/wisatadata', [WisataController::class, 'wisatadataIndex'])->name('wisatadata.index');
    Route::get('/wisatadata/create', [WisataController::class, 'wisatadataCreate'])->name('wisatadata.create');
    Route::get('/wisatadata/{id}/edit', [WisataController::class, 'wisatadataEdit'])->name('wisatadata.edit');
    Route::post('/wisatadata', [WisataController::class, 'wisatadataStore'])->name('wisatadata.store');
    Route::put('/wisatadata/{id}', [WisataController::class, 'wisatadataUpdate'])->name('wisatadata.update');
    Route::delete('/wisatadata/{id}', [WisataController::class, 'wisatadataDestroy'])->name('wisatadata.destroy');
    Route::post('wisatadata/{id}/approve', [WisataController::class, 'approve'])->name('wisatadata.approve');
    Route::post('wisatadata/{id}/reject', [WisataController::class, 'reject'])->name('wisatadata.reject');
    Route::get('/wisatadata/pdf', [WisataController::class, 'pdf'])->name('wisatadata.pdf');
    Route::get('/wisatadata/{id}/pdf', [WisataController::class, 'generateSinglePdf'])->name('wisatadata.singlepdf');

    // Route khusus untuk umkmdata (CRUD manual)
    Route::get('/umkmdata', [UmkmController::class, 'umkmdataIndex'])->name('umkmdata.index');
    Route::get('/umkmdata/create', [UmkmController::class, 'umkmdataCreate'])->name('umkmdata.create');
    Route::get('/umkmdata/{id}/edit', [UmkmController::class, 'umkmdataEdit'])->name('umkmdata.edit');
    Route::post('/umkmdata', [UmkmController::class, 'umkmdataStore'])->name('umkmdata.store');
    Route::put('/umkmdata/{id}', [UmkmController::class, 'umkmdataUpdate'])->name('umkmdata.update');
    Route::delete('/umkmdata/{id}', [UmkmController::class, 'umkmdataDestroy'])->name('umkmdata.destroy');
    Route::post('umkmdata/{id}/approve', [UmkmController::class, 'approve'])->name('umkmdata.approve');
    Route::post('umkmdata/{id}/reject', [UmkmController::class, 'reject'])->name('umkmdata.reject');
    Route::get('/umkmdata/pdf', [UmkmController::class, 'pdf'])->name('umkmdata.pdf');
    Route::get('/umkmdata/{id}/pdf', [UmkmController::class, 'generateSinglePdf'])->name('umkmdata.singlepdf');
});

require __DIR__ . '/auth.php';
