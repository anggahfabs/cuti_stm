<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kacamata extends Model
{
    use HasFactory;

    protected $table = 'kacamata';

    protected $fillable = [
        'user_id',
        'departemen_id',
        'tanggal_pengajuan',
        'jumlah_pengajuan',
        'keterangan',
        'foto1',
        'foto2',
        'status'
    ];
}
