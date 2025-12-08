<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class SofiaController extends Controller
{
    public function formatToStandard(int $day, int $month, int $year): string
    {
        if (! checkdate($month, $day, $year)) {
            return 'Fecha inválida';
        }
        Carbon::setLocale('es');

        $date = Carbon::createSafe($year, $month, $day);

        return $date->isoFormat('dddd, D [de] MMMM [de] YYYY');
    }
}
