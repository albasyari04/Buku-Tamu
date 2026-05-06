<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tamu;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada, untuk menghindari duplikasi saat seeding ulang
        Tamu::query()->delete();

        // Membuat 50 data tamu baru menggunakan factory
        Tamu::factory()->count(50)->create();
    }
}