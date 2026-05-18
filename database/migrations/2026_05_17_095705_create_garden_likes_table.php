<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('garden_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('garden_id')->constrained()->onDelete('cascade');
            $table->string('session_id'); // Use session ID (no auth required)
            $table->timestamps();
            $table->unique(['garden_id', 'session_id']); // One like per session per garden
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('garden_likes');
    }
};
