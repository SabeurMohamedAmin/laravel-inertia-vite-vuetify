<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();

        return [
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => fake()->numberBetween(1, 24),
            'total' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
