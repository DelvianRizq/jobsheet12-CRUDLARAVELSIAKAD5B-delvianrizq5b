@extends('layouts.app')

@section('title', 'Detail Dosen')

@section('content')
<x-page-header judul="Detail Dosen" deskripsi="Informasi lengkap data dosen terpilih." />

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-body d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Informasi Dosen</span>
                <div>
                    @if (Auth::user()->role === 'admin')
                    <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Ubah
                    </a>
                    @endif
                    <a href="{{ route('dosen.index') }}" class="btn btn-outline-secondary btn-sm">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 30%;">NIDN</th>
                        <td>: {{ $dosen->nidn }}</td>
                    </tr>
                    <tr>
                        <th>Nama Dosen</th>
                        <td>: {{ $dosen->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $dosen->email }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>: {{ $dosen->telepon ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $dosen->alamat ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection