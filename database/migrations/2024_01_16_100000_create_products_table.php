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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('slug', 255);
            $table->longText('description')->nullable();
            $table->float('price')->nullable();
            $table->float('price_avans')->nullable();
            $table->boolean('avans_activate')->default(1);
            $table->string('currency', 3)->nullable();
            $table->enum('status', ['draft', 'published', 'auto-draft', 'trashed', 'future']);
            $table->foreignId('user_id')->constrained();
            $table->timestamp('expire_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('external_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
