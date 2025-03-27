<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada minimal satu user
        if (User::count() == 0) {
            User::factory(5)->create();
        }

        // Buat 100 berita
        News::factory(100)->create();
    }
}
