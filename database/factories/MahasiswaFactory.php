<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    public function definition(): array
{
    $jenisKelamin = fake()->randomElement(['L', 'P']);
    $gender = $jenisKelamin === 'L' ? 'male' : 'female';
    $angkatan = fake()->numberBetween(2022, 2025);

    // NIM contoh: 2 digit angkatan + kode prodi (0303) + 4 digit unik
    $nim = substr((string) $angkatan, -2) . '0303' . fake()->unique()->numerify('####');
    $nama = fake()->firstName($gender) . ' ' . fake()->lastName();

    return [
        'nim'           => $nim,
        'nama'          => $nama,
        'jenis_kelamin' => $jenisKelamin,
        'email'         => $nim . '@mhs.example.com',
        'angkatan'      => $angkatan,
        'program_studi' => 'D3 Teknik Informatika',
    ];
}
}