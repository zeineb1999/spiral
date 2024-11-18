<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/message', function () {
    return response()->json(['message' => 'Hello from Laravel API!']);
});
