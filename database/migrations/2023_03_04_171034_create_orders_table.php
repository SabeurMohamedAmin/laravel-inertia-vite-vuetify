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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            // this for products total amount
            $table->double('subtotal', 8, 2);
            // Not sure if i will apply this.
            $table->double('tax', 8, 2);
            //shipping amount
            $table->double('shipping', 8, 2);
            // this GLOBAL total amount
            $table->double('total', 8, 2);
            // this tracks the STATUS of the Order
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])
                ->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
