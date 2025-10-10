<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuti;
use App\Models\User;

class CutiController extends Controller
{
    /**
     * Tampilkan form pengajuan cuti dan riwayat milik staff login.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil semua cuti milik user login
        $cutiList = Cuti::where('user_id', $user->user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil daftar pengganti di departemen yang sama, selain dirinya
        $penggantiList = User::where('departemen_id', $user->departemen_id)
            ->where('user_id', '!=', $user->user_id)
            ->get(['user_id', 'nama_lengkap']);

        return view('staff.ajukan_cuti', compact('user', 'cutiList', 'penggantiList'));
    }

    /**
     * Simpan pengajuan cuti baru.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'jenis_cuti'          => 'required|in:tahunan,sakit,besar,tidak bayar',
            'tanggal_mulai'       => 'required|date',
            'tanggal_selesai'     => 'required|date|after_or_equal:tanggal_mulai',
            'alasan'              => 'required|string|max:255',
            'alamat_selama_cuti'  => 'required|string|max:255',
            'pengganti_id'        => 'required|exists:user,user_id',
        ], [
            'jenis_cuti.in' => 'Jenis cuti tidak valid.',
            'pengganti_id.required' => 'Pilih pengganti dari departemen yang sama.',
        ]);

        // Hitung jumlah hari cuti
        $jumlahHari = (strtotime($request->tanggal_selesai) - strtotime($request->tanggal_mulai)) / 86400 + 1;

        // Simpan data cuti
        Cuti::create([
            'user_id'             => $user->user_id,
            'departemen_id'       => $user->departemen_id,
            'jenis_cuti'          => $request->jenis_cuti,
            'tanggal_mulai'       => $request->tanggal_mulai,
            'tanggal_selesai'     => $request->tanggal_selesai,
            'jumlah_hari'         => $jumlahHari,
            'alasan'              => $request->alasan,
            'alamat_selama_cuti'  => $request->alamat_selama_cuti,
            'pengganti_id'        => $request->pengganti_id,
            'status'              => 'Pending',
        ]);

        return redirect()
            ->route('staff.ajukan_cuti')
            ->with('success', '✅ Pengajuan cuti berhasil dikirim dan menunggu persetujuan atasan.');
    }
}
