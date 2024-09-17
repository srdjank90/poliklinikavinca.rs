<?php

use App\Models\User;
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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 128);                                           // Contact First Name
            $table->string('last_name', 128);                                            // Contact Last Name
            $table->string('jmbg', 32)->nullable();                                      // Contact JMBG
            $table->string('country', 64);                                               // Country
            $table->string('phone', 32);                                                 // Phone
            $table->string('address', 128);                                              // Address
            $table->string('city', 32);                                                  // City
            $table->string('zip', 16);                                                   // ZIP
            $table->string('note', 255)->nullable();                                     // Note
            $table->boolean('primary')->default(0);                                       // Primary Address
            $table->foreignId('user_id')->constrained();                                          // Foreign ID For User
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
