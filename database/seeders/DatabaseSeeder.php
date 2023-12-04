<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    //php artisan db:seed --class=DatabaseSeeder
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'laravel'],
            ['name' => 'php'],
            ['name' => 'javascript'],
            ['name' => 'c++'],
            ['name' => 'java'],
        ]);
        $this->call(UserSeeder::class);
    }
}
