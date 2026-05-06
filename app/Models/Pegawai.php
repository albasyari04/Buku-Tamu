<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'bidang',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    // Jika masih ada relasi dengan tamu, sesuaikan dengan struktur baru
    // public function tamus()
    // {
    //     return $this->hasMany(Tamu::class);
    // }
}