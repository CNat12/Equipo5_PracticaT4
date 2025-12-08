<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NuriController extends Controller
{
    public function analyze(Request $request): JsonResponse
    {
        $request->validate([
            'number' => 'required|integer|min:0',
        ]);

        $number = (int) $request->input('number');

        $isEven = $number % 2 === 0;
        $factorial = $this->calculateFactorial($number);

        return response()->json([
            'number' => $number,
            'is_even' => $isEven,
            'factorial' => $factorial,
        ]);
    }

    private function calculateFactorial(int $n): int
    {
        if ($n === 0 || $n === 1) {
            return 1;
        }

        $result = 1;

        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }

        return $result;
    }
}
