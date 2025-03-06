<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Wisata;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Route::model('wisatum', Wisata::class); // Pastikan Laravel mengenali 'wisatum' sebagai 'wisata'
    }
}
