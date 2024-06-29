<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class ServiceApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
    }

    protected function headers($token)
    {
        return [
            'Authorization' => "Bearer $token",
        ];
    }

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_list_services()
    {
        Service::factory()->count(3)->create();

        $response = $this->getJson('/api/services', $this->headers($this->token));

        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }

    public function test_can_create_service()
    {
        $serviceType = ServiceType::factory()->create();

        $data = [
            'name' => 'Test Service',
            'description' => 'Test Description',
            'properties' => json_encode(['key' => 'value']),
            'service_type_id' => $serviceType->id,
        ];

        $response = $this->postJson('/api/services', $data, $this->headers($this->token));

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'properties',
                'service_type_id',
                'created_at',
                'updated_at'
            ]);

        $this->assertDatabaseHas('services', $data);
    }

    public function test_can_show_service()
    {
        $service = Service::factory()->create();

        $response = $this->getJson('/api/services/' . $service->id, $this->headers($this->token));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'properties',
                'service_type_id',
                'created_at',
                'updated_at'
            ]);
    }

    public function test_can_update_service()
    {
        $service = Service::factory()->create();
        $serviceType = ServiceType::factory()->create();

        $data = [
            'name' => 'Updated Service',
            'description' => 'Updated Description',
            'properties' => json_encode(['updated_key' => 'updated_value']),
            'service_type_id' => $serviceType->id,
        ];

        $response = $this->putJson('/api/services/' . $service->id, $data, $this->headers($this->token));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'properties',
                'service_type_id',
                'created_at',
                'updated_at'
            ]);

        $this->assertDatabaseHas('services', $data);
    }

    public function test_can_delete_service()
    {
        $service = Service::factory()->create();

        $response = $this->deleteJson('/api/services/' . $service->id, $this->headers($this->token));

        $response->assertStatus(204);

        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }
}
