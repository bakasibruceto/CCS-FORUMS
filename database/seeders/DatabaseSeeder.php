<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class DatabaseSeeder extends Seeder
{
    //php artisan db:seed --class=DatabaseSeeder
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Schema::create('forum_posts', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->references('id')->on('users');
        //     $table->string('title');
        //     $table->string('tags')->nullable(true);
        //     $table->longText('markdown');
        //     $table->timestamps();
        // });
        // Schema::create('user_reply', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('post_id')->references('id')->on('forum_posts');
        //     $table->foreignId('user_id')->references('id')->on('users');
        //     $table->longText('markdown');
        //     $table->timestamps();
        // });
        // Schema::create('logs', function (Blueprint $table) {
        //    $table->id();
        //    $table->foreignId('user_id')->references('id')->on('users');
        //    $table->string('actions');
        //    $table->timestamps();
        //});
    }
}
