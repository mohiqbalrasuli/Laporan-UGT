<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GTController;
use App\Http\Controllers\LaporanMasalah;
use App\Http\Controllers\MadrasahController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PJGTController;
use App\Http\Controllers\profileAdmin;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UbahPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'ShowLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'ShowRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// pengajuan GT
Route::get('/pengajuan-gt', [PengajuanController::class, 'index']);
Route::post('/pengajuan-gt/store', [PengajuanController::class, 'store']);
Route::get('/pengajuan-gt/hasil/{id}', [PengajuanController::class, 'Show']);
Route::get('/pengajuan-gt/cetak/{id}', [PengajuanController::class, 'cetakPdf']);

Route::prefix('admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::prefix('data-madrasah')->group(function () {
            Route::get('/', [MadrasahController::class, 'index']);
            Route::post('/store', [MadrasahController::class, 'store']);
            Route::post('/update/{id}', [MadrasahController::class, 'update']);
            Route::get('/delete/{id}', [MadrasahController::class, 'delete']);
        });
        Route::prefix('data-pengurus')->group(function () {
            Route::get('/', [PengurusController::class, 'index']);
            Route::post('/store', [PengurusController::class, 'store']);
            Route::post('/update/{id}', [PengurusController::class, 'update']);
            Route::get('/delete/{id}', [PengurusController::class, 'delete']);
        });
        Route::prefix('data-PJGT')->group(function () {
            Route::get('/', [PJGTController::class, 'index']);
            Route::post('/store', [PJGTController::class, 'store']);
            Route::post('/update/{id}', [PJGTController::class, 'update']);
            Route::get('/delete/{id}', [PJGTController::class, 'delete']);
            Route::post('/nonaktif/{id}', [PJGTController::class, 'nonaktif']);
            Route::get('/PJGT-tidak-aktif', [PJGTController::class, 'validasi']);
            Route::post('/validasi/{id}', [PJGTController::class, 'validasi_aktif']);
            Route::get('data-laporan-PJGT', [PJGTController::class, 'data_laporan']);
            Route::get('/export-laporan', [PJGTController::class, 'export_laporan']);
            Route::get('/laporan/per-laporan-ke/{laporanKe}/zip', [PJGTController::class, 'exportZipPerLaporanKe']);
        });
        Route::prefix('data-GT')->group(function () {
            Route::get('/', [GTController::class, 'index']);
            Route::post('/store', [GTController::class, 'store']);
            Route::post('/update/{id}', [GTController::class, 'update']);
            Route::get('/delete/{id}', [GTController::class, 'delete']);
            Route::post('/nonaktif/{id}', [GTController::class, 'nonaktif']);
            Route::get('/GT-tidak-aktif', [GTController::class, 'validasi']);
            Route::post('/validasi/{id}', [GTController::class, 'validasi_aktif']);
            Route::get('/data-laporan-GT', [GTController::class, 'data_laporan']);
            Route::get('/export-laporan', [GTController::class, 'export_laporan']);
            Route::get('/laporan/per-laporan-ke/{laporanKe}/zip', [GTController::class, 'exportZipPerLaporanKe']);
        });
        Route::get('/setting', [SettingController::class, 'setting']);
        Route::post('/simpan-tanggal-pjgt/{id}', [SettingController::class, 'simpanTanggalPJGT']);
        Route::post('/simpan-tanggal-gt/{id}', [SettingController::class, 'simpanTanggalGT']);
        Route::post('/ubah-password/submit', [UbahPasswordController::class, 'submitUbahPassword']);
        Route::post('/verifikasi-kode', [UbahPasswordController::class, 'verifikasiKode']);
        Route::get('/laporan-masalah', [LaporanMasalah::class, 'index']);
        Route::get('/profile',[profileAdmin::class, 'index']);
        Route::post('/update/{id}', [profileAdmin::class, 'update']);
        Route::get('/pengajuan-gt',[PengajuanController::class,'pengajuanGT']);
        // notifikasi
        Route::get('/notifikasi/baca-semua', [NotificationController::class, 'markAllAsRead'])->name('notifikasi.baca_semua');
        Route::post('/notifikasi/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifikasi.mark_as_read');
    });
Route::prefix('pengurus')
    ->middleware('auth', 'pengurus')
    ->group(function () {
        Route::get('/profile', [PengurusController::class, 'profile']);
        Route::post('/update/{id}', [PengurusController::class, 'update']);
        Route::get('/ubah-password', [UbahPasswordController::class, 'ubah_password']);
        Route::post('/ubah-password/submit', [UbahPasswordController::class, 'submitUbahPassword']);
        Route::post('/verifikasi-kode', [UbahPasswordController::class, 'verifikasiKode']);
        Route::prefix('data-madrasah')->group(function () {
            Route::get('/', [PengurusController::class, 'madrasah']);
        });
        Route::prefix('data-PJGT')->group(function () {
            Route::get('/', [PengurusController::class, 'pjgt']);
            Route::get('data-laporan-PJGT', [PJGTController::class, 'data_laporan']);
            Route::get('/export-laporan', [PJGTController::class, 'export_laporan']);
            Route::get('/laporan/per-laporan-ke/{laporanKe}/zip', [PJGTController::class, 'exportZipPerLaporanKe']);
        });
        Route::prefix('data-GT')->group(function () {
            Route::get('/', [PengurusController::class, 'gt']);
            Route::get('/data-laporan-GT', [GTController::class, 'data_laporan']);
            Route::get('/export-laporan', [GTController::class, 'export_laporan']);
            Route::get('/laporan/per-laporan-ke/{laporanKe}/zip', [GTController::class, 'exportZipPerLaporanKe']);
        });
        Route::get('/laporan-masalah', [LaporanMasalah::class, 'index']);
    });
Route::prefix('PJGT')
    ->middleware('auth', 'PJGT')
    ->group(function () {
        Route::get('/profile', [PJGTController::class, 'profile']);
        Route::post('/update/{id}', [PJGTController::class, 'update']);
        Route::get('/input-laporan', [PJGTController::class, 'input_laporan']);
        Route::post('/input-laporan/store', [PJGTController::class, 'laporan_store']);
        Route::get('/data-laporan-PJGT', [PJGTController::class, 'laporan']);
        Route::get('/ubah-password', [UbahPasswordController::class, 'ubah_password']);
        Route::post('/ubah-password/submit', [UbahPasswordController::class, 'submitUbahPassword']);
        Route::post('/verifikasi-kode', [UbahPasswordController::class, 'verifikasiKode']);
        Route::get('/laporan-masalah', [LaporanMasalah::class, 'indexPJGT']);
        Route::post('/laporan-masalah/store', [LaporanMasalah::class, 'storeLaporanBermasahPJGT']);
    });
Route::prefix('GT')
    ->middleware('auth', 'GT')
    ->group(function () {
        Route::get('/profile', [GTController::class, 'profile']);
        Route::post('/update/{id}', [GTController::class, 'update']);
        Route::get('/input-laporan', [GTController::class, 'input_laporan']);
        Route::post('/input-laporan/store', [GTController::class, 'laporan_store']);
        Route::get('/data-laporan-GT', [GTController::class, 'laporan']);
        Route::get('/ubah-password', [UbahPasswordController::class, 'ubah_password']);
        Route::post('/ubah-password/submit', [UbahPasswordController::class, 'submitUbahPassword']);
        Route::post('/verifikasi-kode', [UbahPasswordController::class, 'verifikasiKode']);
        Route::get('/laporan-masalah', [LaporanMasalah::class, 'indexGT']);
        Route::post('/laporan-masalah/store', [LaporanMasalah::class, 'storeLaporanBermasahGT']);
    });
