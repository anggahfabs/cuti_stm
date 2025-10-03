<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\QrLoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Middleware\VerifyCsrfToken;
// Root → arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// --------------------
// Login routes (Email)
// --------------------
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('login.post');

// --------------------
// Login QR routes
// --------------------
Route::get('/login-qr', [QrLoginController::class, 'showLoginQr'])->name('login.qr');  
// ini otomatis load resources/views/auth/login-qr.blade.php
Route::post('/login-qr', [QrLoginController::class, 'loginWithQr'])->name('login.qr.post');

// --------------------
// Superadmin routes
// --------------------
Route::prefix('superadmin')->group(function () {
    Route::get('dashboard', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');

    // Karyawan (pakai controller)
    Route::get('karyawan', [KaryawanController::class, 'index'])->name('superadmin.karyawan');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('superadmin.karyawan.store');
    Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('superadmin.karyawan.update');
    Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('superadmin.karyawan.destroy');
});
