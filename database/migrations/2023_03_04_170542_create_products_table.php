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
            $table->foreignId('category_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('discount_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            // Add this line to create the pivot table for 
            // the many-to-many relationship
            $table->foreignId('tags_id')->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('name', 255);
            $table->string('slug', 255);
            // in decimal as standard
            $table->double('amount', 8, 2);
            $table->unsignedInteger('quantity');
            $table->text('description');
            // this will be in cm
            $table->integer('height');
            // this will be in cm
            $table->integer('width');
            // this will be in cm
            $table->integer('length');
            // this will be in gramme
            $table->integer('weight');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
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
