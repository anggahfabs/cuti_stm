<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // pakai model User

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil total karyawan dari tabel users
        $totalKaryawan = User::count();

        return view('superadmin.dashboard', compact('totalKaryawan'));
    }
}