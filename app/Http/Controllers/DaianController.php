<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DaianController extends Controller
{
    public function compute(Request $request): JsonResponse
    {
        $data = $request->validate([
            'value' => 'required|numeric',
            'unit' => 'in:radians,degrees',
        ]);

        $value = (float) $data['value'];
        $unit = $data['unit'] ?? 'radians';

        $radians = $unit === 'degrees' ? deg2rad($value) : $value;
        $sin = sin($radians);
        $cos = cos($radians);
        $tan = abs($cos) < 1e-9 ? null : tan($radians);

        return response()->json([
            'input' => [
                'value' => $value,
                'unit' => $unit,
            ],
            'radians' => $radians,
            'sin' => $sin,
            'cos' => $cos,
            'tan' => $tan,
        ]);
    }
}
