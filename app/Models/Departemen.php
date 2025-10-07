<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';
    protected $primaryKey = 'departemen_id';

    protected $fillable = [
        'nama_departemen',
    ];

    // Relasi ke tabel user (1 departemen punya banyak user)
    public function users()
    {
        return $this->hasMany(User::class, 'departemen_id', 'departemen_id');
    }
}
