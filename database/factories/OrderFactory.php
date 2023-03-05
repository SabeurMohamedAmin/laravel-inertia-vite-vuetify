<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        $subtotal = fake()->randomFloat(2, 10, 1000);
        $tax = fake()->randomFloat(2, 1, 10);
        $shipping = fake()->randomFloat(2, 5, 50);
        $total = $subtotal + $tax + $shipping;

        return [
            'user_id' => $user->id,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
            'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
        ];
    }
}
