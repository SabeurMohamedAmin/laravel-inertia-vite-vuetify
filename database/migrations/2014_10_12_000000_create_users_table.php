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
            $table->string('first_name', 24);
            $table->string('last_name', 24);
            $table->string('username', 24);
            $table->string('email')->unique();
            $table->string('phone', 255);
            $table->string('image')->nullable();
            //"shipping_address"
            $table->string('street', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('zip', 255);
            $table->string('country', 255);
            //token ...
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->rememberToken();
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
