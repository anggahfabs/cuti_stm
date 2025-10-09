<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terlambat extends Model
{
    use HasFactory;

    protected $table = 'terlambat';
    protected $primaryKey = 'terlambat_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'jabatan_id',
        'departemen_id',
        'tanggal_terlambat',
        'jam_masuk',
        'total_waktu_terlambat',
        'alasan',
    ];

    // Relasi opsional
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
