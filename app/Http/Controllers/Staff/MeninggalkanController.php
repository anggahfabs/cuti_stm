<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Meninggalkan;

class MeninggalkanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('staff.izin_meninggalkan', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'tanggal_izin' => 'required|date|in:' . date('Y-m-d'),
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i|after:jam_masuk',
            'total_waktu_kerja' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        // Simpan ke database
        Meninggalkan::create([
            'user_id' => $user->user_id,
            'jabatan_id' => $user->jabatan_id,
            'departemen_id' => $user->departemen_id,
            'tanggal' => $request->tanggal_izin,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'total_waktu_kerja' => $request->total_waktu_kerja. ' menit', // misal: "2 jam 0 menit"
            'alasan' => $request->keterangan, // ambil dari textarea form
        ]);

        return redirect()
            ->route('staff.izin_meninggalkan')
            ->with('success', 'Pengajuan izin meninggalkan kerja berhasil dikirim!');
    }
}
