<?php

use App\Http\Controllers\AdminMeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SuperLoginController;
use App\Http\Controllers\SuperMeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/super/login', [SuperLoginController::class, 'login'])->name('super.login');

Route::middleware(['member'])->group(function () {
    Route::get('/me', [MeController::class, 'me']);
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/me', [AdminMeController::class, 'me']);
});

Route::middleware(['super_user'])->group(function () {
    Route::get('/super/me', [SuperMeController::class, 'me']);
});