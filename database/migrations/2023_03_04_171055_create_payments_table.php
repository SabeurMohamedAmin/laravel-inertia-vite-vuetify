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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->onupdate('cascade')->onDelete('cascade');
            $table->foreignId('order_id')->constrained()
                ->onupdate('cascade')->onDelete('cascade');

            $table->string('payment_method');
            $table->double('amount', 8, 2);
            $table->string('transaction_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
