<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('Historical Photos'); // Culture, History, Architecture, Documents, Daily Life
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('media_url');
            $table->string('thumbnail_url')->nullable();
            $table->text('caption')->nullable();
            $table->integer('year')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
