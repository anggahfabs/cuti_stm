<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login dengan NIK & password
    public function doLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik'      => 'required',
            'password' => 'required',
        ], [
            'nik.required'      => 'NIK wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cari user berdasarkan NIK
        $user = User::where('nik', $request->nik)->first();

        // Cek user & password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'NIK atau password salah']);
        }

        // Login user
        Auth::login($user, $request->has('remember')); // support remember me

        // Load relasi role
        $user->load('role');

        // Ambil nama role dari relasi
        $role = strtolower(trim($user->role->nama_role ?? ''));

        // Redirect sesuai role
        switch ($role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboardadmin'); // pastikan route ada
            case 'kadep':
                return redirect()->route('kadep.dashboard');
            case 'bmo':
                return redirect()->route('bmo.dashboard');
            case 'staff':
                return redirect()->route('staff.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'login' => 'Role tidak dikenali.'
                ]);
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
