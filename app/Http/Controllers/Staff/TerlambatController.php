<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Terlambat;

class TerlambatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $terlambatList = Terlambat::where('user_id', $user->user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('staff.izin_terlambat', compact('user', 'terlambatList'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'tanggal_terlambat' => 'required|date|in:' . date('Y-m-d'),
            'jam_masuk' => 'required',
            'total_waktu_terlambat' => 'required|numeric|min:0',
            'alasan' => 'required|string|max:255', // ✅ pakai nama kolom dari DB
        ], [
            'alasan.required' => 'Alasan wajib diisi.',
        ]);

        Terlambat::create([
            'user_id' => $user->user_id,
            'jabatan_id' => $user->jabatan_id,
            'departemen_id' => $user->departemen_id,
            'tanggal_terlambat' => $request->tanggal_terlambat,
            'jam_masuk' => $request->jam_masuk,
            'total_waktu_terlambat' => $request->total_waktu_terlambat,
            'alasan' => $request->alasan, // ✅ sesuai kolom DB
        ]);

        return redirect()->back()->with('success', 'Pengajuan keterlambatan berhasil dikirim!');
    }
}
