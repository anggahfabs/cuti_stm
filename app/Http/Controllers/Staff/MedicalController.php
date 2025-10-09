<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medical;
use App\Models\User;

class MedicalController extends Controller
{
    /**
     * Tampilkan form klaim medical
     */
    public function index()
    {
        return view('staff.medical');
    }

    /**
     * Simpan klaim medical
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi input
        $request->validate([
            'budget' => 'required|numeric',
            'resep_dokter' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'receipt_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // 2️⃣ Ambil user login
        $user = Auth::user();

        // Kalau Auth kosong (kadang error di beberapa session), fallback
        if (!$user) {
            $userId = Auth::id() ?? session('user_id') ?? session('user.user_id');
            if ($userId) {
                $user = User::where('id', $userId)
                    ->orWhere('user_id', $userId)
                    ->first();
            }
        }

        // Kalau tetap null, suruh login ulang
        if (!$user) {
            return redirect()
                ->route('login')
                ->withErrors(['auth' => 'Sesi login sudah habis. Silakan login ulang.']);
        }

        // 3️⃣ Upload file
        $resepPath = $request->file('resep_dokter')->store('medical/resep', 'public');
        $receiptPath = $request->file('receipt_pembayaran')->store('medical/receipt', 'public');

        // 4️⃣ Simpan ke database
        Medical::create([
            'user_id' => $user->user_id ?? $user->id,
            'departemen_id' => $user->departemen_id ?? null,
            'tanggal_pengajuan' => now(),
            'jumlah_pengajuan' => $request->budget,
            'foto1' => $resepPath,
            'foto2' => $receiptPath,
            'status' => 'Pending',
        ]);

        // 5️⃣ Redirect sukses + SweetAlert
        return redirect()
            ->route('staff.medical.index')
            ->with('success', 'Klaim medical berhasil dikirim!');
    }
}
