<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->foreignId('article_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('news_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('content');
            $table->enum('status', ['approved', 'pending', 'rejected'])->default('approved');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
