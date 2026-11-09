@csrf

<div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" 
           class="form-control @error('nim') is-invalid @enderror" 
           id="nim" 
           name="nim" 
           value="{{ old('nim', $mahasiswa->nim) }}" 
           maxlength="15" 
           required 
           autofocus>
    @error('nim')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Nama Mahasiswa</label>
    <input type="text" 
           class="form-control @error('nama') is-invalid @enderror" 
           id="nama" 
           name="nama" 
           value="{{ old('nama', $mahasiswa->nama) }}" 
           maxlength="100" 
           required>
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select>
    @error('jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" 
           class="form-control @error('email') is-invalid @enderror" 
           id="email" 
           name="email" 
           value="{{ old('email', $mahasiswa->email) }}" 
           maxlength="100" 
           required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="angkatan" class="form-label">Angkatan</label>
    <input type="number" 
           class="form-control @error('angkatan') is-invalid @enderror" 
           id="angkatan" 
           name="angkatan" 
           value="{{ old('angkatan', $mahasiswa->angkatan) }}" 
           placeholder="Contoh: 2024" 
           required>
    @error('angkatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="program_studi" class="form-label">Program Studi</label>
    <input type="text" 
           class="form-control @error('program_studi') is-invalid @enderror" 
           id="program_studi" 
           name="program_studi" 
           value="{{ old('program_studi', $mahasiswa->program_studi ?? 'D3 Teknik Informatika') }}" 
           maxlength="100" 
           required>
    @error('program_studi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>