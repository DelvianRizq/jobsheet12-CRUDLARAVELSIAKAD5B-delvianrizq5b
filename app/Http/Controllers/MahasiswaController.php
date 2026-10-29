<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function index(): View
    {
        $kolom = [
            'nim' => 'NIM', 'nama' => 'Nama Lengkap',
            'angkatan' => 'Angkatan', 'email' => 'Email',
            'status' => 'Status',
        ];

        $mahasiswa = [
            ['nim' => '2401001', 'nama' => 'Delvian Rizq', 'angkatan' => 2024, 'email' => 'delvian.rizq@contoh.ac.id', 'status' => 'Aktif'],
            ['nim' => '2401002', 'nama' => 'Victor Von Doom', 'angkatan' => 2024, 'email' => 'victor.von.doom@contoh.ac.id', 'status' => 'Aktif'],
            ['nim' => '2301005', 'nama' => 'Peter Parker', 'angkatan' => 2023, 'email' => 'peter.parker@contoh.ac.id', 'status' => 'Aktif'],
            ['nim' => '2301012', 'nama' => 'Tony Stark', 'angkatan' => 2023, 'email' => 'tony.stark@contoh.ac.id', 'status' => 'Cuti'],
            ['nim' => '2201020', 'nama' => 'Clint Barton', 'angkatan' => 2022, 'email' => 'clint.barton@contoh.ac.id', 'status' => 'Lulus'],
        ];

        return view('mahasiswa.index', compact('kolom', 'mahasiswa'));
    }
    public function show(string $nim): View
    {
        // Data dummy mahasiswa berdasarkan NIM
        $dataMahasiswa = [
        '2401001' => ['nim' => '2401001', 'nama' => 'Delvian Rizq', 'angkatan' => 2024, 'email' => 'delvian.rizq@contoh.ac.id', 'status' => 'Aktif'],
        '2401002' => ['nim' => '2401002', 'nama' => 'Victor Von Doom', 'angkatan' => 2024, 'email' => 'victor.von.doom@contoh.ac.id', 'status' => 'Aktif'],
        '2301005' => ['nim' => '2301005', 'nama' => 'Peter Parker', 'angkatan' => 2023, 'email' => 'peter.parker@contoh.ac.id', 'status' => 'Aktif'],
        '2301012' => ['nim' => '2301012', 'nama' => 'Tony Stark', 'angkatan' => 2023, 'email' => 'tony.stark@contoh.ac.id', 'status' => 'Cuti'],
        '2201020' => ['nim' => '2201020', 'nama' => 'Clint Barton', 'angkatan' => 2022, 'email' => 'clint.barton@contoh.ac.id', 'status' => 'Lulus'],
    ];

        // Jika NIM tidak ada dalam array, tampilkan halaman 404
    if (!array_key_exists($nim, $dataMahasiswa)) {
        abort(404);
    }

    $mhs = $dataMahasiswa[$nim];

    return view('mahasiswa.show', compact('mhs'));
    }
}
