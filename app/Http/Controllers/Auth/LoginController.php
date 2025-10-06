<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        // contoh validasi manual
        if ($request->username === 'superadmin' && $request->password === '1234') {
            // simpan role ke session
            session(['role' => 'superadmin']);
            return redirect()->route('superadmin.dashboard');
        }

        if ($request->username === 'admin' && $request->password === '1234') {
            // simpan role ke session
            session(['role' => 'admin']);
            return redirect()->route('admin.dashboardadmin');
        }

        
        if ($request->username === 'kadep' && $request->password === '1234') {
            // simpan role ke session
            session(['role' => 'Kadep']);
            return redirect()->route('kadep.dashboard');
        }

        if ($request->username === 'bmo' && $request->password === '1234') {
            // simpan role ke session
            session(['role' => 'bmo']);
            return redirect()->route('bmo.dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function logout()
    {
        session()->forget('role'); // hapus session role
        return redirect()->route('auth.login');
    }
}
