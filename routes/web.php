<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GTController;
use App\Http\Controllers\MadrasahController;
use App\Http\Controllers\PJGTController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UbahPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'ShowLogin']);
Route::get('/register',[AuthController::class,'ShowRegister']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::prefix('data-madrasah')->group(function () {
        Route::get('/', [MadrasahController::class, 'index']);
        Route::post('/store', [MadrasahController::class, 'store']);
        Route::post('/update/{id}', [MadrasahController::class, 'update']);
        Route::get('/delete/{id}', [MadrasahController::class, 'delete']);
    });
    Route::prefix('data-PJGT')->group(function () {
        Route::get('/', [PJGTController::class, 'index']);
        Route::post('/store', [PJGTController::class, 'store']);
        Route::post('/update/{id}', [PJGTController::class, 'update']);
        Route::get('/delete/{id}', [PJGTController::class, 'delete']);
        Route::get('/PJGT-tidak-aktif',[PJGTController::class,'validasi']);
        Route::post('/validasi/{id}', [PJGTController::class, 'validasi_aktif']);
        Route::get('data-laporan-PJGT',[PJGTController::class,'data_laporan']);
    });
    Route::prefix('data-GT')->group(function () {
        Route::get('/', [GTController::class, 'index']);
        Route::get('/GT-tidak-aktif',[GTController::class,'validasi']);
        Route::get('/data-laporan-GT', [GTController::class, 'data_laporan']);
    });
    Route::get('/setting',[SettingController::class,'setting']);
});
Route::prefix('PJGT')->group(function () {
    Route::get('/profile', [PJGTController::class, 'profile']);
    Route::get('/input-laporan',[PJGTController::class,'input_laporan']);
    Route::get('/data-laporan-PJGT',[PJGTController::class,'laporan']);
    Route::get('/ubah-password',[UbahPasswordController::class,'ubah_password']);
});
Route::prefix('GT')->group(function () {
    Route::get('/profile', [GTController::class, 'profile']);
    Route::get('/input-laporan',[GTController::class,'input_laporan']);
    Route::get('/data-laporan-GT',[GTController::class,'laporan']);
    Route::get('/ubah-password',[UbahPasswordController::class,'ubah_password']);
});

Route::get('/test-email', function () {
    $user = App\Models\User::find(7); // Ganti sesuai user kamu

    return 'Email test berhasil dikirim ke ' . $user->email;
});
