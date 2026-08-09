<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timeline_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('era'); // e.g. Ottoman & Mandate (1917-1947), Nakba & Partition (1948-1966), 1967 War (1967-1986), Intifadas (1987-2005), Contemporary (2006-Present)
            $table->integer('year');
            $table->string('date_display')->nullable();
            $table->string('location')->nullable();
            $table->text('description');
            $table->longText('details')->nullable();
            $table->string('image_url')->nullable();
            $table->string('impact_level')->default('High'); // Low, Medium, High, Historical Turning Point
            $table->boolean('is_key_event')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timeline_events');
    }
};
