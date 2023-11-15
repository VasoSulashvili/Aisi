<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->image(storage_path('app/public'), 1920, 800, null, false),
            'title' => fake()->word(),
            'description' => fake()->paragraph(3),
            'url' => fake()->url(),
            'active' => 1,
        ];
    }
}
