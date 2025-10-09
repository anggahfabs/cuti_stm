<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meninggalkan extends Model
{
    use HasFactory;

    protected $table = 'meninggalkan';
    protected $primaryKey = 'meninggalkan_id';

    protected $fillable = [
        'user_id',
        'jabatan_id',
        'departemen_id',
        'tanggal',
        'jam_keluar',
        'jam_masuk',
        'total_waktu_kerja',
        'alasan',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
