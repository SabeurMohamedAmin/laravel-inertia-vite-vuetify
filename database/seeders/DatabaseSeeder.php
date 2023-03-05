<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // php artisan migrate --path=database/migrations/2014_10_12_000000_create_users_table.php
        // php artisan migrate --path=database/migrations/2023_03_04_171122_create_categories_table.php
        // php artisan migrate --path=database/migrations/2023_03_05_105611_create_discounts_table.php
        // php artisan migrate --path=database/migrations/2023_03_05_145248_create_tags_table.php

        \App\Models\User::factory(125)->create();
        \App\Models\Category::factory(15)->create();
        \App\Models\Tag::factory(15)->create();
        \App\Models\Discount::factory(5)->create();
        \App\Models\Product::factory(350)->create();
        \App\Models\Order::factory(55)->create();
        \App\Models\Payment::factory(50)->create();
        \App\Models\Review::factory(355)->create();
        \App\Models\Cart::factory(55)->create();
        \App\Models\Cart::factory(200)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
