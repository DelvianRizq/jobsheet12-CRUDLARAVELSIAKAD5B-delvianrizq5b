@extends('layouts.app')

@section('title', '403 - Akses Ditolak')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-75 py-5">
    <div class="text-center">
        <!-- Bootstrap 5 Display Heading & Utilities -->
        <h1 class="display-1 fw-bold text-danger mb-0">403</h1>
        <h2 class="h3 fw-bold text-dark mb-3">Akses Ditolak</h2>
        
        <!-- Bootstrap 5 Text Muted/Secondary -->
        <p class="text-body-secondary mb-4">
            {{ $exception->getMessage() ?: 'Anda tidak berhak mengakses halaman ini.' }}
        </p>
        
        <!-- Bootstrap 5 Button Utility -->
        <a href="{{ route('dashboard') }}" class="btn btn-primary px-4 py-2 shadow-sm">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection