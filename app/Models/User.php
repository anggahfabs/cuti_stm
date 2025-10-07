<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel
    protected $table = 'user';

    // Primary key
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

    // Sembunyikan kolom sensitif saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tambahkan cast kalau nanti butuh remember_token
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // Relasi ke tabel role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Laravel butuh identifier unik (biasanya "email", tapi kita pakai "nik")
    public function getAuthIdentifierName()
    {
        return 'nik';
    }
}
