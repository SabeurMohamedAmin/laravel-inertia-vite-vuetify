<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTag>
 */
class ProductTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $tag = Tag::inRandomOrder()->first();
        return [
            'product_id' => $product->id,
            'tags_id' => $tag->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}