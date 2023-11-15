<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);

        $this->call(RolesSeeder::class);

        $this->call(UsersSeeder::class);

        $this->call(BranchSeeder::class);

        $this->call(GroupSeeder::class);

        $this->call(DancerSeeder::class);

        $this->call(AlbumSeeder::class);

        $this->call(EventTypeSeeder::class);

        $this->call(EventSeeder::class);

        // $this->call(GallerySeeder::class);

        $this->call(SliderSeeder::class);

        $this->call(ArticleSeeder::class);

    }
}
