<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tamu;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamu>
 */
class TamuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tamu::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar nama pegawai untuk diisi di kolom 'bertemu_dengan'
        $pegawai = ['Ahmad Sudrajat, S.IP', 'Budi Santoso, S.Kom', 'Citra Lestari, A.Md', 'Dewi Anggraini, S.Sos', 'Eko Prasetyo, SE'];

        return [
            'nip_nik' => $this->faker->unique()->numerify('################'), // 16 digit NIK
            'nama' => $this->faker->name(),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'instansi' => $this->faker->company(),
            'bertemu_dengan' => $this->faker->randomElement($pegawai),
            'perihal' => $this->faker->sentence(3),
            'tanggal_kunjungan' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}