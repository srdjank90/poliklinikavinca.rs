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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->foreignId('image_id')->nullable();
            $table->text('toc')->nullable();
            $table->boolean('highlighted')->default(0);
            $table->boolean('footer_display')->default(0);
            $table->boolean('menu_display')->default(0);
            $table->boolean('product_single_display')->default(0);
            $table->longText('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->enum('status', ['draft', 'published', 'auto-draft', 'trashed', 'future']);
            $table->foreignId('user_id')->constrained();
            $table->timestamp('expiry_date')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
