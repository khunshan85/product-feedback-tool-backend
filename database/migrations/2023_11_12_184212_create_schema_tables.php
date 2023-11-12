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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
        });

        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->longText('description');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('vote', false, true)->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content', 512);
            $table->foreignId('feedback_id');
            $table->foreign('feedback_id')->references('id')->on('feedbacks');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('feedbacks');
        Schema::dropIfExists('comments');
    }
};
