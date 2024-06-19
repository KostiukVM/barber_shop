<?php

namespace Tests\Feature;

use App\Models\Offer;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    protected bool $refreshDB = true;
    /**
     * A basic feature test example.
     */
    public function testServiceEndpointResponse(): void
    {
        $response = $this->get('/api/services');

        $response->assertStatus(200);
        $response->assertJsonIsArray('data');
        $response->assertJsonCount(Offer::count(), 'data');

        $services = $response->json('data');

        $this->assertArrayHasKey('name', $services[0]);
        $this->assertArrayHasKey('price', $services[0]);
        $this->assertIsNumeric($services[0]['price']);
        $this->assertArrayHasKey('duration', $services[0]);
        $this->assertIsNumeric($services[0]['duration']);
    }
}
