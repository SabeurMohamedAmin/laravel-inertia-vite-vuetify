<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $order = Order::inRandomOrder()->first();
        $paymentMethods = ['paypal', 'stripe'];
        $paymentStatuses = ['pending', 'succeeded', 'failed'];

        return [
            'user_id' => $user->id,
            'order_id' => $order->id,
            'payment_method' => fake()->randomElement($paymentMethods),
            'amount' => fake()->randomFloat(2, 10, 300),
            'transaction_id' => Str::random(255),
            'payment_status' => fake()->randomElement($paymentStatuses),
        ];
    }
}
