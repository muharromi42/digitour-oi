<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsModel>
 */
class NewsFactory extends Factory
{

    protected $model = News::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $judul = $this->faker->sentence(6);
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'deskripsi' => $this->faker->paragraphs(3, true),
            'tanggal' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'foto' => 'news_images/default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
