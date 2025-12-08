<?php

use App\Http\Controllers\NuriController;
use Illuminate\Support\Facades\Route;

Route::post('/math/analyze', [NuriController::class, 'analyze']);
