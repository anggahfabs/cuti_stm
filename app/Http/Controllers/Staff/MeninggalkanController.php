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

    // --- Hitung total waktu ---
    $jamMasuk = strtotime($request->jam_masuk);
    $jamKeluar = strtotime($request->jam_keluar);
    $selisihMenit = ($jamKeluar - $jamMasuk) / 60;

    // Konversi menit jadi format "X jam Y menit"
    $jam = floor($selisihMenit / 60);
    $menit = $selisihMenit % 60;

    if ($jam > 0) {
        $totalWaktu = "{$jam} jam " . ($menit > 0 ? "{$menit} menit" : "");
    } else {
        $totalWaktu = "{$menit} menit";
    }

    // Simpan ke database
    Meninggalkan::create([
        'user_id' => $user->user_id,
        'jabatan_id' => $user->jabatan_id,
        'departemen_id' => $user->departemen_id,
        'tanggal' => $request->tanggal_izin,
        'jam_masuk' => $request->jam_masuk,
        'jam_keluar' => $request->jam_keluar,
        'total_waktu_kerja' => $totalWaktu,
        'alasan' => $request->keterangan,
    ]);

    return redirect()
        ->route('staff.izin_meninggalkan')
        ->with('success', 'Pengajuan izin meninggalkan kerja berhasil dikirim!');
}

}
