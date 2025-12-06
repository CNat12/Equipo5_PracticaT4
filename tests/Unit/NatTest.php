<?php

namespace Tests\Unit;

use Tests\TestCase;

class NatTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        // Simula un usuario
        $this->actingAs(\App\Models\User::factory()->create());
    }

    public function test_palindrome_true(): void
    {
        $response = $this->postJson('/palindrome', [
            'text' => 'Anita lava la tina',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'text' => 'Anita lava la tina',
                'is_palindrome' => true,
                'word_count' => 4,
            ]);
    }

    public function test_palindrome_false(): void
    {
        $response = $this->postJson('/palindrome', [
            'text' => 'Hola mundo',
        ]);

        $response->assertStatus(200);
        $this->assertFalse($response->json('is_palindrome'));
        $this->assertSame(2, $response->json('word_count'));
    }

    public function test_validation_requires_text(): void
    {
        $response = $this->postJson('/palindrome', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('text');
    }
}
