<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    protected $table = 'medical';
    protected $primaryKey = 'medical_id';
    protected $fillable = [
        'user_id',
        'departemen_id',
        'tanggal_pengajuan',
        'jumlah_pengajuan',
        'keterangan',
        'foto1',
        'foto2',
        'foto3',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
