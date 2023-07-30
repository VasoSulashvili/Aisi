<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    protected $data = [
        // Users
        ['name' => 'create.user', 'guard_name' => 'web'],
        ['name' => 'view.user', 'guard_name' => 'web'],
        ['name' => 'update.user', 'guard_name' => 'web'],
        ['name' => 'delete.user', 'guard_name' => 'web'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert($this->data);
    }
}
