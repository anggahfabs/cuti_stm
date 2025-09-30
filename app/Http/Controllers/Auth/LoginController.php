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
        if ($request->username === 'admin' && $request->password === '1234') {
            return redirect()->route('superadmin.dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }
}
