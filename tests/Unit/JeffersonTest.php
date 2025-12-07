<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\JeffersonController;

class JeffersonTest extends TestCase
{
    public function test_valid_security_level_high()
    {
        $controller = new JeffersonController();
        $request = Request::create('/dummy', 'GET', ['level' => 'high']);
        $result = $controller->analyzeSecurity($request);

        $this->assertTrue($result['valid_level']);
        $this->assertIsInt($result['score']);
        $this->assertArrayHasKey('missing_headers', $result);
    }

    public function test_invalid_security_level()
    {
        $controller = new JeffersonController();
        $request = Request::create('/dummy', 'GET', ['level' => 'gold']);
        $result = $controller->analyzeSecurity($request);

        $this->assertFalse($result['valid_level']);
        $this->assertSame('Security level not recognized', $result['message']);
    }
}
