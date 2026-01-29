<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\DB;

// ========================
// AUTH
// ========================
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// ========================
// DASHBOARD + ADMIN ROUTES
// ========================
Route::middleware([AdminAuth::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // ========================
    // SURAT MASUK
    // ========================
    Route::prefix('surat')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index']);            // daftar surat
        Route::get('/tambah', [SuratMasukController::class, 'create']);    // form tambah
        Route::post('/simpan', [SuratMasukController::class, 'store']);    // simpan surat
        Route::get('/edit/{id}', [SuratMasukController::class, 'edit']);   // edit surat
        Route::post('/update/{id}', [SuratMasukController::class, 'update']); // update surat
        Route::get('/hapus/{id}', [SuratMasukController::class, 'destroy']); // hapus surat
        Route::get('/preview/{id}', [SuratMasukController::class, 'preview']); // preview PDF
    });

    // ========================
    // SURAT KELUAR
    // ========================
    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index']);
        Route::get('/tambah', [SuratKeluarController::class, 'create']);
        Route::post('/simpan', [SuratKeluarController::class, 'store']);
        Route::get('/edit/{id}', [SuratKeluarController::class, 'edit']);
        Route::post('/update/{id}', [SuratKeluarController::class, 'update']);
        Route::get('/hapus/{id}', [SuratKeluarController::class, 'destroy']);
        Route::get('/preview/{id}', [SuratKeluarController::class, 'preview']);
    });

});
