<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RequisitionController;

Route::get('/', function () {return view('welcome');});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', function () {return view('index');});
Route::get('/upload', [FileController::class, 'showForm'])->name('upload.form');
Route::get('/contact', function () {return view('contact');});
Route::get('/about', function () {return view('about');});
Route::get('/accueil', function () {return view('accueil');});
Route::get('/profile', function () {return view('profile');});
Route::post('/send-email-with-photo', [EmailController::class, 'sendEmailWithPhoto']);

Route::get('/test', [RequisitionController::class, 'index'])->name('test');
Route::post('/send-message', [EmailController::class, 'sendMessage']);
Route::get('/send-message', function () {
    return 'Cette route est seulement pour le test';
});
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
