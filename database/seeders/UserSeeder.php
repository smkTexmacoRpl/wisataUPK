<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=[
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678'),

            ],
            [
                'name' => 'Super Admin',
                'email' => 'super@gmail.com',
                'role' => 'super',
                'password' => bcrypt('12345678'),


            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345678'),

            ],
        ];
        foreach ($user as $key => $value) {
            \App\Models\User::create($value);
        }
    }
}
