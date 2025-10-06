<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';           // nama tabel
    protected $primaryKey = 'role_id';   // primary key
    public $timestamps = false;          // kalau tabel tidak ada created_at & updated_at

    protected $fillable = ['nama_role'];
}
