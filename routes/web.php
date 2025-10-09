<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\QrLoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Staff\CutiController;
use App\Http\Controllers\Staff\KacamataController;
use App\Http\Controllers\Staff\TerlambatController;
use App\Http\Controllers\Staff\MeninggalkanController;
use App\Http\Controllers\Staff\MedicalController;


/*
|--------------------------------------------------------------------------
| Redirect Root ke Login
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect()->route('login'));

/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/
// Login manual (email / username)
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('login.post');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// Login via QR Code
Route::get('/login-qr', [QrLoginController::class, 'showLoginQr'])->name('login.qr');
Route::post('/login-qr', [QrLoginController::class, 'loginWithQr'])->name('login.qr.post');


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware([Authenticate::class])->group(function () {

    // -------------------- SUPERADMIN --------------------
    Route::prefix('superadmin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');
        Route::get('cuti', fn() => view('superadmin.cuti'))->name('superadmin.cuti');
        Route::get('medical', fn() => view('superadmin.medical'))->name('superadmin.medical');
        Route::get('kacamata', fn() => view('superadmin.kacamata'))->name('superadmin.kacamata');

        // CRUD Karyawan
        Route::get('karyawan', [KaryawanController::class, 'index'])->name('superadmin.karyawan');
        Route::post('karyawan', [KaryawanController::class, 'store'])->name('superadmin.karyawan.store');
        Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('superadmin.karyawan.update');
        Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('superadmin.karyawan.destroy');
    });

    // -------------------- ADMIN --------------------
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboardadmin'))->name('admin.dashboardadmin');

        Route::get('karyawan', [KaryawanController::class, 'index'])->name('admin.karyawanadmin');
        Route::post('karyawan', [KaryawanController::class, 'store'])->name('admin.karyawanadmin.store');
        Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('admin.karyawanadmin.update');
        Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('admin.karyawanadmin.destroy');
    });

    // -------------------- KADEP --------------------
    Route::prefix('kadep')->group(function () {
        Route::get('dashboard', fn() => view('kadep.dashboard'))->name('kadep.dashboard');
        Route::get('pengajuan', fn() => view('kadep.pengajuan'))->name('kadep.pengajuan');
        Route::get('monitoring', fn() => view('kadep.monitoring'))->name('kadep.monitoring');
    });

    // -------------------- BMO --------------------
    Route::prefix('bmo')->group(function () {
        Route::get('dashboard', fn() => view('bmo.dashboard'))->name('bmo.dashboard');
    });

    // -------------------- STAFF --------------------
    Route::prefix('staff')->group(function () {
        Route::get('dashboard', fn() => view('staff.dashboard'))->name('staff.dashboard');
        Route::get('ajukan_cuti', [CutiController::class, 'index'])->name('staff.ajukan_cuti');
        Route::post('ajukan_cuti', [CutiController::class, 'store'])->name('staff.cuti.store');
        Route::get('izin_meninggalkan', fn() => view('staff.izin_meninggalkan'))->name('staff.izin_meninggalkan');

        Route::get('izin_terlambat', fn() => view('staff.izin_terlambat'))->name('staff.izin_terlambat');
        Route::get('settings', fn() => view('staff.settings'))->name('staff.settings');

        // KACAMATA
        Route::get('kacamata', [KacamataController::class, 'index'])->name('staff.kacamata.index');
        Route::post('kacamata', [KacamataController::class, 'store'])->name('staff.kacamata.store');

        // Izin terlambat
        Route::get('izin_terlambat', [TerlambatController::class, 'index'])->name('staff.izin_terlambat');
        Route::post('izin_terlambat', [TerlambatController::class, 'store'])->name('staff.izin_terlambat.store');

        // meninggalkan
        Route::get('izin_meninggalkan', [MeninggalkanController::class, 'index'])->name('staff.izin_meninggalkan');
        Route::post('izin_meninggalkan', [MeninggalkanController::class, 'store'])->name('staff.izin_meninggalkan.store');

        // medical 
       Route::get('medical', [MedicalController::class, 'index'])->name('staff.medical.index');
Route::post('medical', [MedicalController::class, 'store'])->name('staff.medical.store');
    });
});
