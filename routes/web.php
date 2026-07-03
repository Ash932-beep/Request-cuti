<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveRequestController;

Route::middleware(['auth'])->group(function () {

    Route::get('/leave/create', [LeaveRequestController::class, 'create']);
    Route::post('/leave/store', [LeaveRequestController::class, 'store']);

});
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);

});