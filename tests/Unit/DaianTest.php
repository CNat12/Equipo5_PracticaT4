<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DaianTest extends TestCase
{
    use WithoutMiddleware;

    public function test_trig_degrees(): void
    {
        $response = $this->getJson('/trig?value=45&unit=degrees');

        $response->assertStatus(200)
            ->assertJson([
                'input' => [
                    'value' => 45,
                    'unit' => 'degrees',
                ],
            ]);

        $this->assertEqualsWithDelta(0.70710678, $response->json('sin'), 1e-6);
        $this->assertEqualsWithDelta(0.70710678, $response->json('cos'), 1e-6);
        $this->assertEqualsWithDelta(1.0, $response->json('tan'), 1e-6);
    }

    public function test_trig_radians(): void
    {
        $response = $this->getJson('/trig?value=1.57079632679');
        $response->assertStatus(200);
        $this->assertEquals('radians', $response->json('input.unit'));
        $this->assertEqualsWithDelta(1.0, $response->json('sin'), 1e-6);
        $this->assertEqualsWithDelta(0.0, $response->json('cos'), 1e-6);
        $this->assertNull($response->json('tan'));
    }
}
