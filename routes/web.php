<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

// Dashboard (user biasa)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Group untuk superadmin
Route::prefix('superadmin')->group(function () {
    Route::get('dashboard', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');
});
