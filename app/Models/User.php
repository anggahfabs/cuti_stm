<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ======================
    // 🔗 RELASI MODEL
    // ======================

    // Relasi ke tabel role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Relasi ke tabel departemen
    public function departemen()
    {
        return $this->belongsTo(\App\Models\Departemen::class, 'departemen_id', 'departemen_id');
    }

    // Relasi ke tabel jabatan
    public function jabatan()
    {
        return $this->belongsTo(\App\Models\Jabatan::class, 'jabatan_id', 'jabatan_id');
    }

    // Laravel butuh identifier unik (biasanya "email", tapi kita pakai "nik")
    public function getAuthIdentifierName()
    {
        return 'nik';
    }
}
