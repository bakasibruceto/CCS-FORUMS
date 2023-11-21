<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Correct namespace for Hash
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'User One',
            'username' => 'user1',
            'email' => 'user1@example.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('123'), // Change this to a secure password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User 2
        DB::table('users')->insert([
            'name' => 'User Two',
            'username' => 'user2',
            'email' => 'user2@example.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('123'), // Change this to a secure password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
