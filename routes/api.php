<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathController;


Route::post('/math/analyze', [NuriController::class, 'analyze']);
