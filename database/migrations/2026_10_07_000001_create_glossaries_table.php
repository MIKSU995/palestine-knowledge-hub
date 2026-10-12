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
        Schema::create('glossaries', function (Blueprint $table) {
            $table->id();
            $table->string('term'); // e.g. Nakba
            $table->string('slug')->unique(); // e.g. nakba
            $table->string('arabic_term')->nullable(); // e.g. النكبة
            $table->string('category')->default('Sejarah'); // Sejarah, Geografi, Budaya, Hukum, Tokoh
            $table->text('definition'); // Short explanation
            $table->longText('description')->nullable(); // Full explanation
            $table->string('etymology')->nullable(); // Origin of term
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossaries');
    }
};
