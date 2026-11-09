@csrf

<div class="mb-3">
    <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
    <input type="text" 
           class="form-control @error('kode_mk') is-invalid @enderror" 
           id="kode_mk" 
           name="kode_mk" 
           value="{{ old('kode_mk', $matakuliah->kode_mk) }}" 
           maxlength="10" 
           required 
           autofocus>
    @error('kode_mk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
    <input type="text" 
           class="form-control @error('nama_mk') is-invalid @enderror" 
           id="nama_mk" 
           name="nama_mk" 
           value="{{ old('nama_mk', $matakuliah->nama_mk) }}" 
           maxlength="100" 
           required>
    @error('nama_mk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sks" class="form-label">Jumlah SKS</label>
    <input type="number" 
           class="form-control @error('sks') is-invalid @enderror" 
           id="sks" 
           name="sks" 
           value="{{ old('sks', $matakuliah->sks) }}" 
           min="1" 
           max="6" 
           placeholder="Contoh: 3" 
           required>
    @error('sks')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>