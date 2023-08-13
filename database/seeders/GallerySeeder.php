<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = Gallery::factory(20)->create();

        $faker = Faker::create();
        $imageUrl = $faker->imageUrl(640,480, null, false);

        foreach($galleries as $gallery)
        {
            $gallery->addMediaFromUrl($imageUrl)->toMediaCollection('images');
        }
    }
}
