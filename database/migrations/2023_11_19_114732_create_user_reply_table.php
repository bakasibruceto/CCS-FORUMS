<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_reply', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->references('id')->on('forum_posts');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->longText('markdown');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reply');
    }
};
