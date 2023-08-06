<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $branches = Branch::all()->pluck('id')->toArray();
        $branchId = Arr::random($branches);
        return [
            'branch_id' => $branchId,
            'image' => fake()->image(storage_path('app/public'), 640, 480, null, false),
            'name' => fake()->sentence(),
            'description' => fake()->randomHtml(),
            'schedule' => trim(json_encode([
                ['day' => 'monday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
                ['day' => 'tuesday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
                ['day' => 'wednesday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
                ['day' => 'thursday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
                ['day' => 'friday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
                ['day' => 'sutherday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
                ['day' => 'sunday', 'schedule_time_from' => '02:00', 'schedule_time_to' => '08:00'],
            ]), '"'),
            'active' => 1
        ];
    }
}
