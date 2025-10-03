<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Tabel yang dipakai (default Laravel = 'users', kita ganti ke 'user')
    protected $table = 'user';

    // Primary key custom
    protected $primaryKey = 'user_id';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'departemen_id',
        'role_id',
        'jabatan_id',
        'nik',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat',
        'tanggal_masuk',
        'status_karyawan',
        'qr_code',
        'password',
    ];
}
