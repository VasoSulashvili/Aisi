<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'image' => fake()->image(storage_path('app/public'), 960, 540, null, false),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(3),
            'body' => fake()->paragraph(10),
            'active' => 1
        ];
    }
}
