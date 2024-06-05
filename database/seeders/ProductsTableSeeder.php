<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $products = \App\Models\Product::factory(50)->create();
    //     $products->each(function ($product) {
    //         // Debugging: Output the product ID
    //         echo "Product ID: " . $product->id . "\n";

    //         // Attach random categories to each product
    //         $categories = \App\Models\Category::inRandomOrder()->take(rand(1, 8))->pluck('id');

    //         // Debugging: Output the category IDs
    //         echo "Category IDs: " . $categories->implode(', ') . "\n";

    //         $product->categories()->attach($categories);
    //     });
    // }

    public function run(): void
    {
        $products = \App\Models\Product::factory(50)->create();
        $products->each(function ($product) {
            if ($product->id === null || $product->id === 0) {
                echo "Failed to create product or invalid product ID.\n";
                return;
            }

            echo "Product ID: " . $product->id . "\n";
            $categories = \App\Models\Category::inRandomOrder()->take(rand(1, 8))->pluck('id');
            echo "Category IDs: " . $categories->implode(', ') . "\n";

            $product->categories()->attach($categories);
        });
    }

}
