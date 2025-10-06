<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QrLoginController extends Controller
{
    // Tampilkan halaman login QR
    public function showLoginQr()
    {
        return view('auth.login-qr');
    }

    // Proses login dengan QR
    public function loginWithQr(Request $request)
{
    // ambil data langsung dari form
    $nik            = $request->input('nik');
    $namaLengkap    = $request->input('nama_lengkap');
    $namaDepartemen = $request->input('nama_departemen');
    $namaRole       = $request->input('nama_role');

    // cari user di database
    $user = User::where('nik', $nik)
                ->where('nama_lengkap', $namaLengkap)
                ->first();

    if (!$user) {
        return redirect()->route('login.qr')->withErrors([
            'qr_code' => 'User tidak ditemukan'
        ]);
    }

    // login user
    Auth::login($user);

    // Pastikan role ikut ke-load
    $user->load('role');

    // arahkan ke dashboard sesuai role
    switch (strtolower($namaRole)) {
        case 'superadmin':
            return redirect()->route('superadmin.dashboard');
        case 'kadep':
            return redirect()->route('kadep.dashboard');
        case 'bmo':
            return redirect()->route('bmo.dashboard');
        case 'admin':
            return redirect()->route('admin.dashboardadmin');
        case 'staff':
            return redirect()->route('staff.dashboard');
        default:
            return redirect()->route('login.qr')->withErrors([
                'qr_code' => 'Role tidak dikenali'
            ]);
    }
}

}
