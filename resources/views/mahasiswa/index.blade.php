@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<x-page-header judul="Data Mahasiswa" deskripsi="Pencarian dan pengurutan diproses di server." />

<div class="card border-0 shadow-sm">
    <div class="card-header bg-body d-flex justify-content-between align-items-center">
        <span class="fw-semibold">Daftar Mahasiswa</span>
        @if (auth()->user()?->hasRole('admin'))
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Tambah Mahasiswa
            </a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel-mahasiswa" class="table table-striped table-hover align-middle w-100">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('vendor/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
$(function () {
    const csrfToken = @json(csrf_token());

    // 1. Inisialisasi DataTables Server-Side
    $('#tabel-mahasiswa').DataTable({
        processing: true,
        serverSide: true,
        ajax: @json(route('mahasiswa.data', [], false)),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nim', name: 'nim' },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'jenis_kelamin', name: 'jenis_kelamin' },
            { data: 'aksi', name: 'aksi', className: 'text-nowrap', orderable: false, searchable: false }
        ],
        order: [[1, 'asc']],
        language: {
            processing: 'Memuat data...',
            search: 'Cari:',
            lengthMenu: 'Tampilkan _MENU_ data',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
            infoEmpty: 'Tidak ada data',
            infoFiltered: '(disaring dari _MAX_ data)',
            zeroRecords: 'Data tidak ditemukan',
            paginate: {
                first: 'Awal', last: 'Akhir',
                next: 'Berikutnya', previous: 'Sebelumnya'
            }
        }
    });

    // 2. Event Delegation Hapus Data AJAX (Soft Delete) + SweetAlert2
    $(document).on('click', '.btn-hapus', function () {
        const url = this.dataset.url;
        const nama = this.dataset.nama;

        Swal.fire({
            title: 'Hapus data mahasiswa?',
            text: 'Data ' + nama + ' akan dipindahkan ke tempat sampah.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#dc3545'
        }).then(function (hasil) {
            if (!hasil.isConfirmed) return;

            $.ajax({
                url: url,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            }).done(function (respons) {
                $('#tabel-mahasiswa').DataTable().ajax.reload(null, false);
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Berhasil',
                    text: respons.message,
                    showConfirmButton: false,
                    timer: 3000
                });
            }).fail(function (xhr) {
                const pesan = (xhr.responseJSON && xhr.responseJSON.message) || 'Data tidak dapat dihapus.';
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal (' + xhr.status + ')',
                    text: pesan
                });
            });
        });
    });

    // 3. FITUR TAMBAHAN 2: Event Delegation Restore Data AJAX + SweetAlert2
    $(document).on('click', '.btn-restore', function () {
        const url = this.dataset.url;
        const nama = this.dataset.nama;

        Swal.fire({
            title: 'Pulihkan data mahasiswa?',
            text: 'Data ' + nama + ' akan dikembalikan.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ya, pulihkan',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#198754'
        }).then(function (hasil) {
            if (!hasil.isConfirmed) return;

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            }).done(function (respons) {
                $('#tabel-mahasiswa').DataTable().ajax.reload(null, false);
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Berhasil',
                    text: respons.message,
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        });
    });
});
</script>
@endpush