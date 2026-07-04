<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_ping_endpoint_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/ping');

        $response->assertStatus(200)->assertJson(['pong' => true]);
    }
}
