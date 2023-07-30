<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    protected $data = [
        'name' => 'admin', 'guard_name' => 'web'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all();

        $role = Role::create($this->data);

        $role->syncPermissions($permissions);
    }
}
