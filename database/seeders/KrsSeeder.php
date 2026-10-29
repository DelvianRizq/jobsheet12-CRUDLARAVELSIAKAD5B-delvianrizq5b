<?php

namespace Database\Seeders;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class KrsSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswa10 = Mahasiswa::limit(10)->get();

        foreach ($mahasiswa10 as $mhs) {
            $krs = Krs::create([
                'mahasiswa_id'   => $mhs->id,
                'tahun_akademik' => '2026/2027',
                'semester'       => 'Ganjil',
                'status'         => 'draft', 
            ]);

            $mataKuliahIds = MataKuliah::inRandomOrder()
                ->limit(5)
                ->pluck('id');

            $krs->matakuliah()->attach($mataKuliahIds);
        }
    }
}