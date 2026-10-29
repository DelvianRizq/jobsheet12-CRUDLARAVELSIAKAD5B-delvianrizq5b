<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $statistik = [
            ['judul' => 'Mahasiswa', 'jumlah' => 1250, 'ikon' => 'bi-mortarboard-fill', 'warna' => 'primary'],
            ['judul' => 'Dosen', 'jumlah' => 68, 'ikon' => 'bi-person-badge-fill', 'warna' => 'success'],
            ['judul' => 'Mata Kuliah', 'jumlah' => 94, 'ikon' => 'bi-book-fill', 'warna' => 'warning'],
            ['judul' => 'KRS Aktif', 'jumlah' => 842, 'ikon' => 'bi-journal-check', 'warna' => 'info'],
            ['judul' => 'Rata-rata SKS', 'jumlah' => 21, 'ikon' => 'bi-calculator-fill', 'warna' => 'secondary'],
        ];

        $kolomkrs = [
            'nim' => 'NIM', 'nama' => 'Nama Mahasiswa',
            'sks' => 'SKS', 'status' => 'Status',
        ];

        $krsTerbaru = [
            ['nim' => '2401001', 'nama' => 'Delvian Rizq', 'sks' => 22, 'status' => 'Disetujui'],
            ['nim' => '2401002', 'nama' => 'Victor Von Doom', 'sks' => 20, 'status' => 'Disetujui'],
            ['nim' => '2301005', 'nama' => 'Peter Parker', 'sks' => 24, 'status' => 'Menunggu'],
            ['nim' => '2301012', 'nama' => 'Tony Stark', 'sks' => 18, 'status' => 'Menunggu'],
            ['nim' => '2201026', 'nama' => 'Clint Barton', 'sks' => 21, 'status' => 'Disetujui'],
        ];

        $statuskrs = [
            ['label' => 'Disetujui', 'persen' => 70, 'warna' => 'success'],
            ['label' => 'Menunggu', 'persen' => 22, 'warna' => 'warning'],
            ['label' => 'Ditolak', 'persen' => 8, 'warna' => 'danger'],
        ];

        return view('dashboard', compact('statistik', 'kolomkrs', 'krsTerbaru', 'statuskrs'));
    }
}