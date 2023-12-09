<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'profile_photo' => 'default-profile-image.png', 'role' => 'admin', 'password' => bcrypt('password')],
            ['name' => 'Developer', 'email' => 'mdabdurrahman542@gmail.com', 'profile_photo' => 'default-profile-image.png', 'role' => 'admin', 'password' => bcrypt('password2023ab')],
            ['name' => 'User', 'email' => 'user@gmail.com', 'profile_photo' => 'default-profile-image.png', 'role' => 'user', 'password' => bcrypt('password')],
        ]);
    }
}
