<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KaryawanController;

// Root → arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('login.post');
Route::get('/login-qr', function () {
    return view('auth.login-qr');
})->name('login.qr');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'doRegister'])->name('register.post');

// Group untuk superadmin
Route::prefix('superadmin')->group(function () {
    Route::get('dashboard', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');

    // Karyawan (pakai controller)
    Route::get('karyawan', [KaryawanController::class, 'index'])->name('superadmin.karyawan');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('superadmin.karyawan.store');
    // Route::get('superadmin/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('superadmin.karyawan.edit');
    // Route::post('karyawan/{id}/update', [App\Http\Controllers\KaryawanController::class, 'update'])->name('superadmin.karyawan.update');
    Route::put('karyawan/{id}', [App\Http\Controllers\KaryawanController::class, 'update'])
    ->name('superadmin.karyawan.update');
    Route::delete('karyawan/{id}', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('superadmin.karyawan.destroy');
});
