<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rate = fake()->numberBetween(1, 5);
        $isApproved = fake()->boolean(90);
        $randomNumber = fake()->numberBetween(0, 500);
        $user = User::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $jsonData = fake()->imageUrl();
        $images = fake()->randomElement([null, $jsonData, $jsonData]);

        return [
            'parent_id' => 0,
            'user_id' => $user->id,
            'product_id' => $product->id,
            'is_approved' => $isApproved,
            'rate' => $rate,
            'title' => $isApproved ? fake()->sentence : null,
            'body' => fake()->paragraphs(2, true),
            'images' => json_encode($images),
            'helpful_count' => $randomNumber,
            'not_helpful_count' => $randomNumber,
        ];
    }
}
