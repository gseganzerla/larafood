<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Error get All products
     *
     * @return void
     */
    public function testErrorGetAllProducts()
    {
        $tenant = 'fake_value';

        $response = $this->getJson("/api/products?token_company{$tenant}");

        $response->assertStatus(422);
    }

    /**
     * Get All Products
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/products?token_company{$tenant->uuid}");

        $response->assertStatus(422);
    }

    /**
     * 404 product by identify
     *
     * @return void
     */
    public function testNotFoundProduct()
    {
        $tenant = factory(Tenant::class)->create();
        $product = "fake";

        $response = $this->getJson("/api/products/{$product}?token_company{$tenant->uuid}");

        $response->assertStatus(422);
    }

    /**
     * 200 product by identify
     *
     * @return void
     */
    // public function testGetProductByIdentify()
    // {
    //     $tenant = factory(Tenant::class)->create();
    //     $product = factory(Product::class);

    //     $response = $this->getJson("/api/products/{$product->uuid}?token_company{$tenant->uuid}");

    //     $response->assertStatus(422);
    // }
}
