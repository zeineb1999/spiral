<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('/message', function () {
    return response()->json(['message' => 'Hello from Laravel API!']);
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', function () {
    return view('index');
});


Route::get('/upload', [FileController::class, 'showForm'])->name('upload.form');
Route::post('/sendEmail', [FileController::class, 'sendEmail'])->name('sendEmail');
Route::get('/send-msg', [FileController::class, 'index']);