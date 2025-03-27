<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password default
            'remember_token' => Str::random(10),
            'role' => $this->faker->randomElement(['admin', 'user']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    // Definisi state untuk admin
    public function admin()
    {
        return $this->state([
            'role' => 'admin',
            'name' => 'Administrator'
        ]);
    }
}
