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
        Schema::create('gold_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('slug', 255);
            $table->longText('description')->nullable();
            $table->float('price')->nullable();
            $table->float('price_dynamic')->nullable();
            $table->boolean('dynamic_price_activate')->default(0);
            $table->timestamp('expire_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gold_packages');
    }
};
