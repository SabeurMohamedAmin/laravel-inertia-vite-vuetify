<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryProduct>
 */
class CategoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        return [
            'uuid' => Str::uuid(),
            'category_id' => $category->id,
            'product_id' => $product->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
