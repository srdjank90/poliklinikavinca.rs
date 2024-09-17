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
        Schema::create('product_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');                             // Name with underscores used for name attribute also example: first_name
            $table->string('label');                            // Label description of input field
            $table->text('description')->nullable();            // Help or full description for field
            $table->string('type')->default('text');            // Type of input
            $table->string('attr_class')->nullable();           // Class for imput element
            $table->string('attr_id')->nullable();              // ID for input element
            $table->boolean('required')->default(0);            // Is input required
            $table->text('options')->nullable();                // Options for select input
            $table->string('position')->nullable();             // Where to position it on UI
            $table->integer('sequence')->nullable();            // Order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_fields');
    }
};
