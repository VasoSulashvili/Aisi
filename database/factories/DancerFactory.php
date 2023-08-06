<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dancer>
 */
class DancerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $groupIds = Group::all()->pluck('id')->toArray();

        $id = Arr::random($groupIds);
        return [
            'group_id' => $id,
            'image' => fake()->image(storage_path('app/public'), 640, 480, null, false),
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'biography' => fake()->randomHtml(),
            'birth_date' => fake()->date(),
            'active' => 1
        ];
    }
}
