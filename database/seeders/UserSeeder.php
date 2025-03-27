<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin utama
        User::factory()->admin()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123')
        ]);

        // Buat 49 user lainnya
        User::factory(49)->create();
    }
}
