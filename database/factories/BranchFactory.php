<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->image(storage_path('app/public'), 640, 480, null, false),
            'name' => fake()->sentence(),
            'address' => fake()->streetAddress(),
            'map' => fake()->streetAddress(),
            'active' => 1
        ];
    }
}
