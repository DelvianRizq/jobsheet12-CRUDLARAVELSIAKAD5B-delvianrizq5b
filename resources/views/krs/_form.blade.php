@csrf

<div class="mb-3">
    <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
    <select class="form-select @error('mahasiswa_id') is-invalid @enderror" id="mahasiswa_id" name="mahasiswa_id" required>
        <option value="">-- Pilih Mahasiswa --</option>
        @foreach ($mahasiswa as $mhs)
            <option value="{{ $mhs->id }}" {{ old('mahasiswa_id', $krs->mahasiswa_id) == $mhs->id ? 'selected' : '' }}>
                {{ $mhs->nim }} - {{ $mhs->nama }}
            </option>
        @endforeach
    </select>
    @error('mahasiswa_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
    <input type="text" 
           class="form-control @error('tahun_akademik') is-invalid @enderror" 
           id="tahun_akademik" 
           name="tahun_akademik" 
           value="{{ old('tahun_akademik', $krs->tahun_akademik ?? '2024/2025') }}" 
           placeholder="Contoh: 2024/2025" 
           required>
    @error('tahun_akademik')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <select class="form-select @error('semester') is-invalid @enderror" id="semester" name="semester" required>
        <option value="">-- Pilih Semester --</option>
        <option value="Ganjil" {{ old('semester', $krs->semester) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
        <option value="Genap" {{ old('semester', $krs->semester) == 'Genap' ? 'selected' : '' }}>Genap</option>
    </select>
    @error('semester')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status KRS</label>
    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
        <option value="draft" {{ old('status', $krs->status ?? 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="diajukan" {{ old('status', $krs->status) == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
        <option value="disetujui" {{ old('status', $krs->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
        <option value="ditolak" {{ old('status', $krs->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Pilih Mata Kuliah</label>
    @error('mata_kuliah_ids')
        <div class="text-danger small mb-2">{{ $message }}</div>
    @enderror
    <div class="card card-body bg-light border-0" style="max-height: 250px; overflow-y: auto;">
        @forelse ($matakuliah as $mk)
            <div class="form-check mb-2">
                <input class="form-check-input" 
                       type="checkbox" 
                       name="mata_kuliah_ids[]" 
                       value="{{ $mk->id }}" 
                       id="mk_{{ $mk->id }}"
                       {{ (is_array(old('mata_kuliah_ids', $selectedMataKuliah)) && in_array($mk->id, old('mata_kuliah_ids', $selectedMataKuliah))) ? 'checked' : '' }}>
                <label class="form-check-label" for="mk_{{ $mk->id }}">
                    <strong>{{ $mk->kode_mk }}</strong> - {{ $mk->nama_mk }} <span class="badge bg-secondary">{{ $mk->sks }} SKS</span>
                </label>
            </div>
        @empty
            <p class="text-muted mb-0">Belum ada data mata kuliah.</p>
        @endforelse
    </div>
</div>