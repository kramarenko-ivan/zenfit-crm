<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_client()
    {
        $client = Client::factory()->create([
            'name' => 'Test Client',
            'email' => 'client@example.com',
            'phone' => '0123456789',
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('clients', [
            'email' => 'client@example.com',
        ]);

        $this->assertEquals('Test Client', $client->name);
    }

    #[Test]
    public function it_can_update_a_client()
    {
        $client = Client::factory()->create();
        $client->update(['status' => 'inactive']);

        $this->assertEquals('inactive', $client->status);
    }

    #[Test]
    public function it_can_delete_a_client()
    {
        $client = Client::factory()->create();
        $client->delete();

        $this->assertDatabaseMissing('clients', [
            'id' => $client->id,
        ]);
    }
}
