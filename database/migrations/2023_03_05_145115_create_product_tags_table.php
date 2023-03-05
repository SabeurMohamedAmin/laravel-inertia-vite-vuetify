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
        Schema::create('product_tags', function (Blueprint $table) {
            $table->foreignId('product_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('tags_id')->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['product_id', 'tags_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     **/
    public function down(): void
    {
        Schema::dropIfExists('product_tags');
    }
};
