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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 64);                                              // First Name
            $table->string('last_name', 64);                                               // Last Name
            $table->date('dob')->nullable();                                                        // Date of Birth
            $table->string('gender', 8)->nullable();                                       // Gender
            $table->string('country', 64)->nullable();                                     // Nullable
            $table->string('avatar')->nullable();                                                   // Avatar
            $table->string('phone', 32)->nullable();                                       // Phone
            $table->string('email')->unique();                                                      // Email
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('role_id')->constrained();                                            // Role ID
            $table->text('additional_permissions')->nullable();                                     // Additional Permissions
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
