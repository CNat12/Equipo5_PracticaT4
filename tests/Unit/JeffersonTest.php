<?php

namespace Tests\Unit;

use App\Http\Controllers\JeffersonController;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class JeffersonTest extends TestCase
{
    public function test_valid_security_level_high()
    {
        $controller = new JeffersonController();
        $request = new Request();
        $request->query->set('level', 'high');

        $result = $controller->analyzeSecurity($request);

        $this->assertTrue($result['valid_level']);
        $this->assertIsInt($result['score']);
        $this->assertArrayHasKey('missing_headers', $result);
    }

    public function test_invalid_security_level()
    {
        $controller = new JeffersonController();
        $request = new Request();
        $request->query->set('level', 'gold');

        $result = $controller->analyzeSecurity($request);

        $this->assertFalse($result['valid_level']);
        $this->assertSame('Security level not recognized', $result['message']);
    }
}