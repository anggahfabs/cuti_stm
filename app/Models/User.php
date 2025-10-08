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

    // Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Departemen
    public function departemen()
    {
        return $this->belongsTo(\App\Models\Departemen::class, 'departemen_id', 'departemen_id');
    }

    // Jabatan
    public function jabatan()
    {
        return $this->belongsTo(\App\Models\Jabatan::class, 'jabatan_id', 'jabatan_id');
    }

    // ======================
    // 👓 RELASI TAMBAHAN
    // ======================

    // Relasi ke tabel Kacamata
    public function kacamata()
    {
        return $this->hasMany(\App\Models\Kacamata::class, 'user_id', 'user_id');
    }

    // Relasi ke tabel Cuti
    public function cuti()
    {
        return $this->hasMany(\App\Models\Cuti::class, 'user_id', 'user_id');
    }

    // Relasi ke tabel Medical
    public function medical()
    {
        return $this->hasMany(\App\Models\Medical::class, 'user_id', 'user_id');
    }

    // Laravel pakai NIK untuk login (bukan email)
    public function getAuthIdentifierName()
    {
        return 'nik';
    }
}
