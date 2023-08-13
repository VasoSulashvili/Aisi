<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ids = Album::all()->pluck('id')->toArray();

        $id = Arr::random($ids);
        
        return [
            'album_id' => $id,
            'title' => fake()->word(),
            'description' => fake()->paragraph(),
            'active' => 1,
        ];
    }
}
