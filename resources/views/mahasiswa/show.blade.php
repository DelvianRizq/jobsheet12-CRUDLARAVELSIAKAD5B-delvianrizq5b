@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<x-page-header :judul="'Detail Mahasiswa: ' . $mhs['nama']" deskripsi="Informasi rinci data mahasiswa.">
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</x-page-header>

<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-body fw-semibold">Data Profil</div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 120px;">NIM</th>
                        <td>: {{ $mhs['nim'] }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $mhs['nama'] }}</td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td>: {{ $mhs['angkatan'] }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $mhs['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: <span class="badge text-bg-primary">{{ $mhs['status'] }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection