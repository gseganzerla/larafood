<?php

// namespace Tests\Feature\Api;

// use App\Models\Client;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class AuthTest extends TestCase
// {
//     /**
//      * Test validation auth
//      *
//      * @return void
//      */
//     public function testValidationAuth()
//     {
//         $response = $this->postJson('/api/auth/token');

//         $response->assertStatus(401);
//     }


//     /**
//      * Test auth fake
//      *
//      * @return void
//      */
//     public function testAuthClientFake()
//     {
//         $payload = [
//             'email' => 'a@email.com',
//             'password' => 'fake',
//             'device_name' => 'android'
//         ];

//         $response = $this->postJson('/api/auth/token', $payload);

//         $response->assertStatus(401);
//     }

//     public function testAuthClient()
//     {
//         $client = Client::create([
//             'name' => 'gui',
//             'email' => 'fake_emaim@email.com',
//             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
//         ]);

//         $payload = [
//             'email' => 'fake_emaim@email.com',
//             'password' => 'password',
//             'device_name' => 'chromelinux'
//         ];

//         $response = $this->postJson('/api/auth/token', $payload);
//         // $response->dump();
//         $response->assertStatus(200);
//             // ->assertJsonStructure(['token']);
//     }
// }
