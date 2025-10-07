<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // jangan lupa import model User

class Jabatan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'jabatan';

    // Primary key tabel
    protected $primaryKey = 'jabatan_id';

    // Kolom yang bisa diisi mass assignment
    protected $fillable = [
        'nama_jabatan',
    ];

    // Relasi ke tabel user (1 jabatan punya banyak user)
    public function users()
    {
        return $this->hasMany(User::class, 'jabatan_id', 'jabatan_id');
    }
}
