<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nonaktifkan pengecekan foreign key untuk sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Kosongkan tabel pegawai sebelum seeding
        Pegawai::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create('id_ID'); // Menggunakan lokal Indonesia

        $jabatans = [
            'Kepala Badan', 'Sekretaris', 'Analis Kepegawaian', 'Pranata Komputer',
            'Arsiparis', 'Pengelola Data', 'Staf Pelaksana', 'Auditor Kepegawaian',
            'Pengembang Teknologi Pembelajaran', 'Widyaiswara', 'Analis SDM Aparatur',
            'Pengelola Keuangan'
        ];

        $bidangs = [
            'Sekretariat',
            'Bidang Mutasi dan Promosi',
            'Bidang Pengembangan Kompetensi Aparatur',
            'Bidang Pengadaan, Pemberhentian dan Informasi',
            'Bidang Penilaian Kinerja Aparatur dan Penghargaan',
        ];

        for ($i = 0; $i < 50; $i++) {
            // Membuat NIP palsu yang realistis
            $tahun = $faker->numberBetween(1980, 2002);
            $bulan = str_pad($faker->numberBetween(1, 12), 2, '0', STR_PAD_LEFT);
            $tanggal = str_pad($faker->numberBetween(1, 28), 2, '0', STR_PAD_LEFT);
            $tahunMasuk = $faker->numberBetween(2005, 2023);
            $kodeJK = $faker->randomElement(['1', '2']);
            $nomorUrut = str_pad($faker->numberBetween(1, 999), 3, '0', STR_PAD_LEFT);

            $nip = "{$tahun}{$bulan}{$tanggal}{$tahunMasuk}01{$kodeJK}{$nomorUrut}";

            Pegawai::create([
                'nip' => $nip,
                'nama' => $faker->name,
                'jabatan' => $faker->randomElement($jabatans),
                'bidang' => $faker->randomElement($bidangs),
                'status' => 1, // 1 merepresentasikan 'true' atau 'aktif'
            ]);
        }
    }
}