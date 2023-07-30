<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    protected $data = [
        'name' => 'admin',
        'email' => 'admin@admin.test',
        'password' => '123123123'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->data['password'] = bcrypt($this->data['password']);

        $user = User::create($this->data);

        $user->assignRole('admin');
    }
}
