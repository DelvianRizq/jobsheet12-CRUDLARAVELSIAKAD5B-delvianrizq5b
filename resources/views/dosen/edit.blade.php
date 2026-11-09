@extends('layouts.app')

@section('title', 'Ubah Dosen')

@section('content')
<x-page-header judul="Ubah Dosen" deskripsi="Perbarui data dosen yang sudah terdaftar." />

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('dosen.update', $dosen) }}" novalidate>
                    @method('PUT')
                    @include('dosen._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection