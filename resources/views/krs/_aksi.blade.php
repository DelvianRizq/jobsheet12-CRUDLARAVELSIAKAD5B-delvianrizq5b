<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('krs.show', $krs->id) }}" 
       class="btn btn-outline-info" 
       title="Detail" 
       aria-label="Detail KRS">
        <i class="bi bi-eye"></i>
    </a>

    @if (auth()->user()?->hasRole('admin'))
        <a href="{{ route('krs.edit', $krs->id) }}" 
           class="btn btn-outline-warning" 
           title="Ubah" 
           aria-label="Ubah KRS">
            <i class="bi bi-pencil-square"></i>
        </a>
        <button type="button" 
                class="btn btn-outline-danger btn-hapus" 
                data-url="{{ route('krs.destroy', $krs->id, false) }}" 
                data-nama="KRS {{ $krs->mahasiswa->nama ?? '' }}" 
                title="Hapus" 
                aria-label="Hapus KRS">
            <i class="bi bi-trash"></i>
        </button>
    @endif
</div>