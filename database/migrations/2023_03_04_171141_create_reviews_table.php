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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('parent_id');
            $table->foreignId('user_id');
            $table->foreignId('product_id')->constrained()
                ->onUpdate('cascade');
            $table->boolean('is_approved');
            $table->unsignedSmallInteger('rate');
            $table->string('title', 255)->nullable();
            $table->text('body');
            $table->json('images')->nullable();
            $table->integer('helpful_count');
            $table->integer('not_helpful_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
