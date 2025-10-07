<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\QrLoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\DashboardController;
// Root → arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// --------------------
// Login routes (Email)
// --------------------
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('login.post');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

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

    Route::get('cuti', function () {
        return view('superadmin.cuti');
    })->name('superadmin.cuti');

     Route::get('medical', function () {
        return view('superadmin.medical');
    })->name('superadmin.medical');

    Route::get('kacamata', function () {
        return view('superadmin.kacamata');
    })->name('superadmin.kacamata');

    // Karyawan (pakai controller)
    Route::get('karyawan', [KaryawanController::class, 'index'])->name('superadmin.karyawan');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('superadmin.karyawan.store');
    Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('superadmin.karyawan.update');
    Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('superadmin.karyawan.destroy');
});

// --------------------
// admin routes
// --------------------
Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboardadmin');
    })->name('admin.dashboardadmin');

       // Data Karyawan
    Route::get('karyawan', function () {
        return view('admin.karyawanadmin'); 
    })->name('admin.karyawanadmin');
    // Data Karyawan → pakai controller yang sama
    Route::get('karyawan', [KaryawanController::class, 'index'])->name('admin.karyawanadmin');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('admin.karyawanadmin.store');
    Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('admin.karyawanadmin.update');
    Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('admin.karyawanadmin.destroy');
});

// --------------------
// kadep routes
// --------------------
Route::prefix('kadep')->group(function () {
    Route::get('dashboard', function () {
        return view('kadep.dashboard');
    })->name('kadep.dashboard');

       // Data Pengajuan
    Route::get('pengajuan', function () {
        return view('kadep.pengajuan'); 
    })->name('kadep.pengajuan');

        // Monitoring Staff
    Route::get('monitoring', function () {
        return view('kadep.monitoring'); 
    })->name('kadep.monitoring');
});

// --------------------
// bmo routes
// --------------------
Route::prefix('bmo')->group(function () {
    Route::get('dashboard', function () {
        return view('bmo.dashboard');
    })->name('bmo.dashboard');
   }); 


//routes dashboard//

Route::get('/superadmin/dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');



// --------------------
// staff routes
// --------------------

Route::prefix('staff')->group(function () {
    Route::get('dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');

    Route::get('ajukan-cuti', function () {
        return view('staff.ajukan_cuti');
    })->name('staff.ajukan_cuti');
});

