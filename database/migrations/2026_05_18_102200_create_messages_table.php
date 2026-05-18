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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            // CRITICAL: Since sender_id and receiver_id reference MongoDB users, we use string instead of foreignId
            $table->string('sender_id');
            $table->string('receiver_id');
            // Standard SQLite foreign key constraint for gardens
            $table->foreignId('garden_id')->constrained()->cascadeOnDelete();
            
            $table->text('message_text');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
