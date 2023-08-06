<?php

namespace Database\Factories;

use App\Models\EventType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $eventTypes = EventType::all()->pluck('id')->toArray();

        $id = Arr::random($eventTypes);

        // dd($id);
        return [
            'event_type_id' => $id,
            'image' => fake()->image(storage_path('app/public'), 640, 480, null, false),
            'name' => fake()->word(),
            'date' => fake()->date(),
            'description' => fake()->randomHtml(),
            'active' => 1,
        ];
    }
}
