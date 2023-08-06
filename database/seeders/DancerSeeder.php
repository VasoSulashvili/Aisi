<?php

namespace Database\Seeders;

use App\Models\Dancer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dancer::factory(12)->create();
    }
}
