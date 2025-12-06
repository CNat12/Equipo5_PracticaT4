<?php

namespace Tests\Unit;

use Tests\TestCase;

class NatTest extends TestCase
{
    //verifica que la oracion si lo sea
    public function test_palindrome_true(): void
    {
        //post
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
    //ahora verifica la otra palabra

    public function test_palindrome_false(): void
    {
        $response = $this->postJson('/palindrome', [
            'text' => 'Hola mundo',
        ]);

        $response->assertStatus(200);
        $this->assertFalse($response->json('is_palindrome'));
        $this->assertSame(2, $response->json('word_count'));
    }
    
    //test sea obligatorio

    public function test_validation_requires_text(): void
    {
        $response = $this->postJson('/palindrome', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('text');
    }
}