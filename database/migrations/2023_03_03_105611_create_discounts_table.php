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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('code', 255)->unique();
            //percentage-based vs. fixed amount 5% | 5$
            $table->enum('type', ['percentage', 'fixed']);
            // it is related to type it can be 10.00% | 10.00$
            $table->double('value', 8, 2);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->unsignedSmallInteger('max_uses')->default(0);
            $table->unsignedSmallInteger('uses')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
