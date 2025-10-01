<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'nik'            => 'required|unique:user,nik',
            'nama_lengkap'   => 'required',
            'email'          => 'required|email|unique:user,email',
            'departemen_id'  => 'required',
            'role_id'        => 'required',
            'jabatan_id'     => 'required',
            'status_karyawan'=> 'required',
        ]);

        DB::table('user')->insert([
            'departemen_id'   => $request->departemen_id,
            'role_id'         => $request->role_id,
            'jabatan_id'      => $request->jabatan_id,
            'nik'             => $request->nik,
            'nama_lengkap'    => $request->nama_lengkap,
            'email'           => $request->email,
            'no_hp'           => $request->no_hp,
            'alamat'          => $request->alamat,
            'tanggal_masuk'   => $request->tanggal_masuk,
            'status_karyawan' => $request->status_karyawan,
            'qr_code'         => $request->qr_code,
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
