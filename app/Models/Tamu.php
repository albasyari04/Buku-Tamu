<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip_nik',
        'nama',
        'no_hp',
        'alamat',
        'instansi',
        'bertemu_dengan',
        'perihal',
        'tanggal_kunjungan'
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'datetime'
    ];

    // HAPUS relasi pegawai karena tidak ada foreign key pegawai_id
    // Field 'bertemu_dengan' adalah string biasa, bukan relasi
}