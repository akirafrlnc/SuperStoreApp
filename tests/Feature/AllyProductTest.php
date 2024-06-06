<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ally;
use App\Models\Category;
use App\Models\Product;

class AllyProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_products_for_an_ally()
    {
        // Arrange: Create an ally and assign some products
        $ally = Ally::factory()->create();
        $ally->categories()->attach($category = Category::factory()->create());
        $category->products()->attach($product = Product::factory()->create());

        // Act: Make a GET request to the endpoint
        $response = $this->get('/api/ally/' . $ally->url . '/products');

        // Assert: Check if the products are returned correctly
        $response->assertStatus(200);
        $response->assertJson([$product->toArray()]);
    }
}
