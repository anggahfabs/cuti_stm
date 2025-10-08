<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kacamata;

class KacamataController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ambil semua klaim kacamata milik user login
        $kacamataList = Kacamata::where('user_id', $user->user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('staff.kacamata', compact('user', 'kacamataList'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'jenis' => 'required|string|max:100',
            'file_receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_hasil_pemeriksaan' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'jenis.required' => 'Jenis klaim wajib dipilih.',
            'file_receipt.required' => 'Receipt pembayaran wajib diunggah.',
            'file_hasil_pemeriksaan.required' => 'Hasil pemeriksaan wajib diunggah.',
        ]);

        // Simpan file
        $foto1 = $request->file('file_hasil_pemeriksaan')->store('kacamata/hasil_pemeriksaan', 'public');
        $foto2 = $request->file('file_receipt')->store('kacamata/receipt', 'public');

        // Ambil budget (konversi string ke angka)
        $budget = preg_replace('/[^\d]/', '', $request->input('budget')); // "Rp 1.500.000" → 1500000

        // Simpan ke database
        Kacamata::create([
            'user_id' => $user->user_id,
            'departemen_id' => $user->departemen_id,
            'tanggal_pengajuan' => now(),
            'jumlah_pengajuan' => $budget,
            'keterangan' => 'Klaim Kacamata - ' . $request->jenis,
            'foto1' => $foto1,
            'foto2' => $foto2,
            'status' => 'Pending',
        ]);

        return redirect()->route('staff.kacamata.index')->with('success', 'Klaim kacamata berhasil dikirim!');
    }
}
