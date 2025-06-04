<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GTController;
use App\Http\Controllers\MadrasahController;
use App\Http\Controllers\PJGTController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::prefix('data-madrasah')->group(function () {
        Route::get('/', [MadrasahController::class, 'index']);
    });
    Route::prefix('data-PJGT')->group(function () {
        Route::get('/', [PJGTController::class, 'index']);
    });
    Route::prefix('data-GT')->group(function () {
        Route::get('/', [GTController::class, 'index']);
    });
});
Route::prefix('PJGT')->group(function () {
    Route::get('/profile', [PJGTController::class, 'profile']);
});
Route::prefix('GT')->group(function () {
    Route::get('/profile', [GTController::class, 'profile']);
});
