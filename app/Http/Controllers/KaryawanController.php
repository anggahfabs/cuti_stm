<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $departemenFilter = $request->departemen; // ⬅️ ambil dari dropdown

    $query = DB::table('user')
        ->leftJoin('departemen', 'user.departemen_id', '=', 'departemen.departemen_id')
        ->leftJoin('jabatan', 'user.jabatan_id', '=', 'jabatan.jabatan_id')
        ->leftJoin('role', 'user.role_id', '=', 'role.role_id')
        ->select(
            'user.user_id',
            'user.nik',
            'user.nama_lengkap',
            'user.email',
            'user.no_hp',
            'user.alamat',
            'user.tanggal_masuk',
            'user.status_karyawan',
            'user.qr_code',
            'departemen.nama_departemen',
            'jabatan.nama_jabatan',
            'role.nama_role'
        )
        ->when(!empty($search), function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('user.nama_lengkap', 'LIKE', "%$search%")
                    ->orWhere('user.nik', 'LIKE', "%$search%")
                    ->orWhere('departemen.nama_departemen', 'LIKE', "%$search%")
                    ->orWhere('jabatan.nama_jabatan', 'LIKE', "%$search%")
                    ->orWhere('role.nama_role', 'LIKE', "%$search%");
            });
        })
        ->when(!empty($departemenFilter), function ($q) use ($departemenFilter) {
            $q->where('user.departemen_id', $departemenFilter);
        }) // ⬅️ filter departemen aktif
        ->orderBy('user.nama_lengkap', 'asc');

    // ✅ Gunakan paginate agar bisa pakai links()
    $karyawan = $query->paginate(10);

    // ✅ Tambah ->appends agar filter & search tetap tersimpan saat pindah halaman
    $karyawan->appends($request->all());

    // dropdown
    $departemen = DB::table('departemen')->orderBy('nama_departemen')->get();
    $jabatan    = DB::table('jabatan')->get();
    $role       = DB::table('role')->get();

    // superadmin
    if ($request->is('superadmin/*')) {
        return view('superadmin.karyawan', compact('karyawan', 'departemen', 'jabatan', 'role'));
    }

    // admin
    if ($request->is('admin/*')) {
        return view('admin.karyawanadmin', compact('karyawan', 'departemen', 'jabatan', 'role'));
    }
}



    public function store(Request $request)
    {
        $request->validate([
            'nik'             => 'required|unique:user,nik',
            'nama_lengkap'    => 'required|string|max:255',
            'departemen_id'   => 'required|integer',
            'jabatan_id'      => 'required|integer',
            'role_id'         => 'required|integer',
            'email'           => 'required|email|unique:user,email',
            'status_karyawan' => 'required|string',
        ]);

        DB::table('user')->insert([
            'nik'             => $request->nik,
            'nama_lengkap'    => $request->nama_lengkap,
            'departemen_id'   => $request->departemen_id,
            'jabatan_id'      => $request->jabatan_id,
            'role_id'         => $request->role_id,
            'email'           => $request->email,
            'no_hp'           => $request->no_hp,
            'alamat'          => $request->alamat,
            'tanggal_masuk'   => $request->tanggal_masuk,
            'status_karyawan' => $request->status_karyawan,
            'qr_code'         => $request->qr_code,
            'password'        => $request->password,
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        if (request()->is('superadmin/*')) {
            return redirect()->route('superadmin.karyawan')->with('success', 'Karyawan berhasil ditambahkan.');
        }

        if (request()->is('admin/*')) {
            return redirect()->route('admin.karyawanadmin')->with('success', 'Karyawan berhasil ditambahkan.');
        }
    }

    public function edit($id)
    {
        $karyawan   = DB::table('user')->where('user_id', $id)->first();
        $departemen = DB::table('departemen')->get();
        $jabatan    = DB::table('jabatan')->get();
        $role       = DB::table('role')->get();

        if (request()->is('superadmin/*')) {
            return view('superadmin.karyawan-edit', compact('karyawan', 'departemen', 'jabatan', 'role'));
        }

        if (request()->is('admin/*')) {
            return view('admin.karyawanadmin-edit', compact('karyawan', 'departemen', 'jabatan', 'role'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'             => 'required|unique:user,nik,' . $id . ',user_id',
            'nama_lengkap'    => 'required|string|max:255',
            'departemen_id'   => 'required|integer',
            'jabatan_id'      => 'required|integer',
            'role_id'         => 'required|integer',
            'email'           => 'required|email|unique:user,email,' . $id . ',user_id',
            'status_karyawan' => 'required|string',
        ]);

        DB::table('user')->where('user_id', $id)->update([
            'nik'             => $request->nik,
            'nama_lengkap'    => $request->nama_lengkap,
            'departemen_id'   => $request->departemen_id,
            'jabatan_id'      => $request->jabatan_id,
            'role_id'         => $request->role_id,
            'email'           => $request->email,
            'no_hp'           => $request->no_hp,
            'alamat'          => $request->alamat,
            'tanggal_masuk'   => $request->tanggal_masuk,
            'status_karyawan' => $request->status_karyawan,
            'qr_code'         => $request->qr_code ?? null,
            'updated_at'      => now(),
        ]);

        if (request()->is('superadmin/*')) {
            return redirect()->route('superadmin.karyawan')->with('success', 'Data karyawan berhasil diperbarui.');
        }

        if (request()->is('admin/*')) {
            return redirect()->route('admin.karyawanadmin')->with('success', 'Data karyawan berhasil diperbarui.');
        }
    }

    public function destroy($id)
    {
        DB::table('user')->where('user_id', $id)->delete();

        if (request()->is('superadmin/*')) {
            return redirect()->route('superadmin.karyawan')->with('success', 'Data karyawan berhasil dihapus.');
        }

        if (request()->is('admin/*')) {
            return redirect()->route('admin.karyawanadmin')->with('success', 'Data karyawan berhasil dihapus.');
        }
    }
}
