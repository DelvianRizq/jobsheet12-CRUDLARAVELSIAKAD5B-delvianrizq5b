@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
<x-page-header judul="Tambah Dosen" deskripsi="Isi formulir berikut untuk menambah data dosen baru." />

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('dosen.store') }}" novalidate>
                    @include('dosen._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection