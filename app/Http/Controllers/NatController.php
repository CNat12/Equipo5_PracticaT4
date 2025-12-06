<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NatController extends Controller
{
    public function check(Request $request)
    {
        // Valida que venga un texto
        $data = $request->validate([
            'text' => 'required|string|min:1',
        ]);

        $text = $data['text'];

        // Normaliza: solo letras/números en minúsculas
        $clean = strtolower(preg_replace('/[^a-z0-9]/i', '', $text));

        // Palíndromo si es igual al texto invertido
        $isPalindrome = $clean === strrev($clean);

        // Conteo simple de palabras
        $wordCount = str_word_count($text);

        return response()->json([
            'text' => $text,
            'is_palindrome' => $isPalindrome,
            'word_count' => $wordCount,
        ]);
    }
}