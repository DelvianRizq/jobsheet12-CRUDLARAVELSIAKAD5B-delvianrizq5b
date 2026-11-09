@extends('layouts.app')

@section('title', 'Detail KRS')

@section('content')
<x-page-header judul="Detail Kartu Rencana Studi" deskripsi="Informasi rincian KRS dan daftar mata kuliah yang diambil." />

<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-body fw-semibold">Informasi Mahasiswa</div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">NIM</dt>
            <dd class="col-sm-9">{{ $krs->mahasiswa->nim ?? '-' }}</dd>

            <dt class="col-sm-3">Nama Mahasiswa</dt>
            <dd class="col-sm-9">{{ $krs->mahasiswa->nama ?? '-' }}</dd>

            <dt class="col-sm-3">Tahun Akademik</dt>
            <dd class="col-sm-9">{{ $krs->tahun_akademik }}</dd>

            <dt class="col-sm-3">Semester</dt>
            <dd class="col-sm-9">{{ $krs->semester }}</dd>

            <dt class="col-sm-3">Status KRS</dt>
            <dd class="col-sm-9">
                @if ($krs->status == 'disetujui')
                    <span class="badge bg-success">Disetujui</span>
                @elseif ($krs->status == 'diajukan')
                    <span class="badge bg-info text-dark">Diajukan</span>
                @elseif ($krs->status == 'ditolak')
                    <span class="badge bg-danger">Ditolak</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </dd>
        </dl>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-body fw-semibold">Daftar Mata Kuliah yang Diambil</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No.</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th class="text-center" style="width: 100px;">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($krs->mataKuliah as $index => $mk)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mk->kode_mk }}</td>
                            <td>{{ $mk->nama_mk }}</td>
                            <td class="text-center">{{ $mk->sks }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada mata kuliah yang diambil pada KRS ini.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="fw-bold table-light">
                        <td colspan="3" class="text-end">Total SKS:</td>
                        <td class="text-center">{{ $krs->mataKuliah->sum('sks') }} SKS</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-3">
            <a href="{{ route('krs.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

            @if (auth()->user()?->hasRole('admin'))
                <a href="{{ route('krs.edit', $krs) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Ubah
                </a>
            @endif
        </div>
    </div>
</div>
@endsection