<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cultures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('arabic_title')->nullable();
            $table->string('category'); // Seni, Kuliner, Musik, Pakaian, Tradisi
            $table->text('description');
            $table->longText('content')->nullable();
            $table->string('image_url')->nullable();
            $table->string('region')->nullable(); // e.g. West Bank, Gaza, Diaspora
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('petitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('content')->nullable();
            $table->string('target_signatures')->default('10000');
            $table->integer('signature_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('external_link')->nullable();
            $table->timestamps();
        });

        Schema::create('petition_signatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petition_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('Indonesia');
            $table->text('message')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petition_signatures');
        Schema::dropIfExists('petitions');
        Schema::dropIfExists('cultures');
    }
};
