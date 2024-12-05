<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

Route::get('/', function () {return view('welcome');});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('/index', function () {return view('index');});
//Route::get('/upload', [FileController::class, 'showForm'])->name('upload.form');
//Route::get('/contact', function () {return view('contact');});
//Route::get('/about', function () {return view('about');});
//Route::get('/accueil', function () {return view('accueil');});
//Route::get('/profile', function () {return view('profile');});
Route::post('/send-email-with-photo', [EmailController::class, 'sendEmailWithPhoto']);

Route::get('/test', [TestController::class, 'indexTest'])->name('test');
Route::post('/send-message', [EmailController::class, 'sendMessage']);
Route::get('/send-message', function () {
    return 'Cette route est seulement pour le test';
});
//Route::get('/test', [ProfileController::class, 'showProfile'])->name('test');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
//Route::get('/requisitions', [RequisitionController::class, 'filter']);
Route::get('/requisitions/filter', [RequisitionController::class, 'filter'])->name('requisitions.filter');
Route::get('/requisitions', [RequisitionController::class, 'fetchRequisitions'])->name('requisitions.fetch');
Route::get('/requisitions/advanced-search', [RequisitionController::class, 'advancedSearch'])->name('requisitions.advancedSearch');
Route::get('/requisitionsAvance', [RequisitionController::class, 'fetchRequisitionsAvance'])->name('requisitions.fetchAvance');