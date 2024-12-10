<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PveController;

Route::get('/', function () {return view('welcome');});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/send-email-with-photo', [EmailController::class, 'sendEmailWithPhoto']);
Route::get('/test', [TestController::class, 'indexTest'])->name('test');
Route::post('/send-message', [EmailController::class, 'sendMessage']);
Route::get('/send-message', function () {
    return 'Cette route est seulement pour le test';
});
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
Route::get('/requisitions/filter', [RequisitionController::class, 'filter'])->name('requisitions.filter');
Route::get('/requisitions/advanced-search', [RequisitionController::class, 'advancedSearch'])->name('requisitions.advancedSearch');
Route::get('/requisitions', [RequisitionController::class, 'paginate'])->name('requisitions.paginate');
Route::get('/requisitionsAvance', [RequisitionController::class, 'advancedSearch'])->name('requisitions.advancedSearch');
Route::get('/pve', [PveController::class, 'show'])->name('pve');
Route::get('/rapport', [PveController::class, 'rapport'])->name('rapport');
