<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test get all tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/tenants');

        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    
    /**
     * Test get all tenants
     *
     * @return void
     */
    public function testErrorGetTenant()
    {

        $tenant = 'fake';

        $response = $this->getJson("/api/tenants/{$tenant}");

        $response->assertStatus(404);
    }



    /**
     * Test get all tenants
     *
     * @return void
     */
    public function testTenantByIdentify()
    {

        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/tenants/{$tenant->uuid}");

        $response->assertStatus(200);

    }
}
