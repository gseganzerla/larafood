<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Error create new Clientt
     *
     * @return void
     */
    public function testErrorCreateNewClient()
    {
        $payload = [
            'email' => 'gui.ironweasel@gmail.com',
            'name' => 'Guilherme Seganzerla'
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(422);
        // ->assertExactJson([
        //     'message' => "The given data was invalid.",
        //     'errors' => [
        //         'password' =>
        //         [trans('validation.required', ['attribute' => 'password'])]
        //     ]
        // ]);
    }

    /**
     * Test create new Clientt
     *
     * @return void
     */
    public function testCreateNewClient()
    {
        $payload = [
            'email' => 'gui.ironweasel@gmail.com',
            'name' => 'Guilherme Seganzerla',
            'password' => 'ironweasel'
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201)
        ->assertExactJson([
            'data' => [
                'name' => $payload['name'],
                'email' => $payload['email'],
            ]
        ]);
    }
}
