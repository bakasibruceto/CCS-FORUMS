<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Correct namespace for Hash
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('123'), // Change this to a secure password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
