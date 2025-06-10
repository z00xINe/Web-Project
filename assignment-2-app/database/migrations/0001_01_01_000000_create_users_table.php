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
        Schema::create('Users', function (Blueprint $table) {
            $table->string('full_name', 50);
            $table->string('user_name', 50)->unique();
            $table->string('phone_number', 13);
            $table->string('whatsapp_number', 13);
            $table->string('address', 50);
            $table->string('password', 255);
            $table->string('email', 50)->unique();
            // $table->string('user_image', 100);
            // $table->string('original_file_name', 255);
            $table->timestamp('reg_date')->useCurrent()->useCurrentOnUpdate();
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
