<?php

use App\Http\Controllers\DaianController;
use App\Http\Controllers\NatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/palindrome', [NatController::class, 'check']);
Route::get('/trig', [DaianController::class, 'compute']);
