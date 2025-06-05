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
        Route::get('/data-laporan-GT', [GTController::class, 'data_laporan']);
    });
});
Route::prefix('PJGT')->group(function () {
    Route::get('/profile', [PJGTController::class, 'profile']);
});
Route::prefix('GT')->group(function () {
    Route::get('/profile', [GTController::class, 'profile']);
    Route::get('/input-laporan',[GTController::class,'input_laporan']);
    Route::get('/data-laporan-GT',[GTController::class,'laporan']);
    Route::get('/ubah-password',[GTController::class,'ubah_password']);
});
