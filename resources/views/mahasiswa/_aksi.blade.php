<div class="btn-group btn-group-sm" role="group">
    @if ($mahasiswa->trashed())
        @if (auth()->user()?->hasRole('admin'))
            <button type="button" 
                    class="btn btn-outline-success btn-restore" 
                    data-url="{{ route('mahasiswa.restore', $mahasiswa->id) }}" 
                    data-nama="{{ $mahasiswa->nama }}" 
                    title="Pulihkan Data">
                <i class="bi bi-arrow-counterclockwise"></i> Pulihkan
            </button>
        @endif
    @else
        <a href="{{ route('mahasiswa.show', $mahasiswa) }}" class="btn btn-outline-info" title="Detail">
            <i class="bi bi-eye"></i>
        </a>

        @if (auth()->user()?->hasRole('admin'))
            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-outline-warning" title="Ubah">
                <i class="bi bi-pencil-square"></i>
            </a>
            <button type="button" 
                    class="btn btn-outline-danger btn-hapus" 
                    data-url="{{ route('mahasiswa.destroy', $mahasiswa, false) }}" 
                    data-nama="{{ $mahasiswa->nama }}" 
                    title="Hapus">
                <i class="bi bi-trash"></i>
            </button>
        @endif
    @endif
</div>