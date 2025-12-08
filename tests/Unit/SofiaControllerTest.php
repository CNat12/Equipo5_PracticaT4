<?php

namespace Tests\Unit;

use App\Http\Controllers\SofiaController;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class SofiaControllerTest extends TestCase
{
    protected SofiaController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new SofiaController;
        Carbon::setLocale('es');
    }

    public function test_it_formats_a_valid_date_correctly()
    {
        $day = 7;
        $month = 12;
        $year = 2025;

        $expectedFormat = 'domingo, 7 de diciembre de 2025';
        /* $expectedFormat = 'Sunday, December 7, 2025'; */

        $this->assertEquals(
            $expectedFormat,
            $this->controller->formatToStandard($day, $month, $year)
        );
    }

    public function test_it_returns_invalid_date_for_non_existent_date()
    {
        $day = 30;
        $month = 2;
        $year = 2024;

        $this->assertEquals(
            'Fecha inválida',
            $this->controller->formatToStandard($day, $month, $year)
        );
    }
}
