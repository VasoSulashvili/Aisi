<?php

namespace Database\Factories;

use App\Models\Album;
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

        $eventTypeId = Arr::random(EventType::all()->pluck('id')->toArray());

        $albumId = Arr::random(Album::all()->pluck('id')->toArray());

        return [
            'event_type_id' => $eventTypeId,
            'album_id' => $albumId,
            'image' => fake()->image(storage_path('app/public'), 640, 480, null, false),
            'name' => fake()->word(),
            'date' => fake()->date(),
            'description' => fake()->randomHtml(),
            'active' => 1,
        ];
    }
}
