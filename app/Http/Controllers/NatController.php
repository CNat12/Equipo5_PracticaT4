<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NatController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $text = $request->input('text');
        $clean = strtolower(preg_replace('/\s+/', '', $text));
        $isPalindrome = $clean === strrev($clean);
        $wordCount = str_word_count($text);

        return response()->json([
            'text' => $text,
            'is_palindrome' => $isPalindrome,
            'word_count' => $wordCount,
        ]);
    }
}
