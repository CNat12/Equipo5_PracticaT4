<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeffersonController extends Controller
{
    /**
     * @return array<string, mixed>
     */
    public function analyzeSecurity(Request $request): array
    {
        $level = strtolower($request->query('level', 'medium'));

        $securityMatrix = [
            'low' => [
                'X-Content-Type-Options',
            ],
            'medium' => [
                'X-Content-Type-Options',
                'X-XSS-Protection',
            ],
            'high' => [
                'X-Content-Type-Options',
                'X-XSS-Protection',
                'Strict-Transport-Security',
                'X-Frame-Options',
                'Referrer-Policy',
            ],
        ];

        if (! array_key_exists($level, $securityMatrix)) {
            return [
                'requested_level' => $level,
                'valid_level' => false,
                'message' => 'Security level not recognized',
            ];
        }

        $presentHeadersMock = [
            'X-Content-Type-Options',
            'X-XSS-Protection',
        ];

        $missing = array_diff($securityMatrix[$level], $presentHeadersMock);

        $score = (int) round(
            (count($securityMatrix[$level]) - count($missing)) /
            count($securityMatrix[$level]) * 100
        );

        return [
            'requested_level' => $level,
            'valid_level' => true,
            'required_headers' => $securityMatrix[$level],
            'present_headers' => $presentHeadersMock,
            'missing_headers' => array_values($missing),
            'score' => $score,
        ];
    }
}

