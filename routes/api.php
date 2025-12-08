<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NuriController;


Route::post('/math/analyze', [NuriController::class, 'analyze']);
