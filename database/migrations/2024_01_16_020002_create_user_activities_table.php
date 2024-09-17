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
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->string('model', 64);                                // Model
            $table->string('action', 16);                               // Action
            $table->string('ip', 32);                                   // IP Address
            $table->string('platform', 128);                            // OS Platform
            $table->foreignId('user_id')->constrained();                // Foreign ID For User
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};
