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
        Schema::create('library', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('thumb_trending_small')->nullable();
            $table->string('thumb_trending_large')->nullable();
            $table->string('thumb_small');
            $table->string('thumb_medium');
            $table->string('thumb_large');
            $table->integer('year');
            $table->string('category');
            $table->string('rating');
            $table->boolean('bookmarked')->default(false);
            $table->boolean('trending')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library');
    }
};
