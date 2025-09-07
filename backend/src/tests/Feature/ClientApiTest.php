<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientApiTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test_token')->plainTextToken;

        return ['Authorization' => "Bearer $token"];
    }

    /** @test */
    public function it_can_list_all_clients()
    {
        Client::factory()->count(3)->create();
        $headers = $this->authenticate();

        $response = $this->getJson('/api/clients', $headers);
        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    /** @test */
    public function it_can_create_a_client()
    {
        $headers = $this->authenticate();

        $payload = [
            'name' => 'Test Client',
            'email' => 'newclient@example.com',
            'phone' => '9876543210',
            'status' => 'active',
        ];

        $response = $this->postJson('/api/clients', $payload, $headers);
        $response->assertStatus(201)
            ->assertJsonPath('data.email', 'newclient@example.com')
            ->assertJsonPath('data.name', 'Test Client');
    }

    /** @test */
    public function it_can_show_a_client()
    {
        $client = Client::factory()->create();
        $headers = $this->authenticate();

        $response = $this->getJson("/api/clients/{$client->id}", $headers);
        $response->assertStatus(200)
            ->assertJsonPath('data.id', $client->id)
            ->assertJsonPath('data.email', $client->email);
    }

    /** @test */
    public function it_can_update_a_client()
    {
        $client = Client::factory()->create(['status' => 'active']);
        $headers = $this->authenticate();

        $response = $this->putJson("/api/clients/{$client->id}", ['status' => 'inactive'], $headers);
        $response->assertStatus(200)
            ->assertJsonPath('data.status', 'inactive');
    }

    /** @test */
    public function it_can_delete_a_client()
    {
        $client = Client::factory()->create();
        $headers = $this->authenticate();

        $response = $this->deleteJson("/api/clients/{$client->id}", [], $headers);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
