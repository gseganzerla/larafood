<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    private $tenant, $products;

    public function setUp(): void
    {
        parent::setUp();
    
        $this->tenant = factory(Tenant::class)->create();
        $this->products = factory(Product::class, 10)->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testValidationCreateNewOrder()
    {
        $payload = [];

        $response = $this->postJson('/api/orders', $payload);

        // $response->dump();
        $response->assertStatus(422);
    }

    public function testCreateNewOrder()
    {
        $payload = [
            'token_company' => $this->tenant->uuid,
            'products' => [],
        ];

        foreach ($this->products as $product) {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'quantity' => 2
            ]);
        }

        $response = $this->postJson('/api/orders', $payload);
        $response->assertStatus(201);
    }

    public function testTotalNewOrder()
    {
        $payload = [
            'token_company' => $this->tenant->uuid,
            'products' => [],
        ];

        foreach ($this->products as $product) {
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'quantity' => 1
            ]);
        }

        $response = $this->postJson('/api/orders', $payload);

        $response->assertStatus(201)
            ->assertJsonPath('data.total', 25.8);
    }
}
