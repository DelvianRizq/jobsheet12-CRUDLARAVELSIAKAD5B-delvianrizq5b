@csrf

<div class="mb-3">
    <x-form-input label="NIDN" name="nidn" :value="$dosen->nidn"
                  maxlength="20" required autofocus />
</div>

<div class="mb-3">
    <x-form-input label="Nama Dosen" name="nama" :value="$dosen->nama"
                  maxlength="120" required />
</div>

<div class="mb-3">
    <x-form-input label="Email" name="email" type="email" :value="$dosen->email"
                  maxlength="120" required />
</div>

<div class="mb-3">
    <x-form-input label="Telepon" name="telepon" :value="$dosen->telepon"
                  maxlength="20" />
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea id="alamat" name="alamat" rows="3" maxlength="500"
              @class(['form-control', 'is-invalid' => $errors->has('alamat')])
    >{{ old('alamat', $dosen->alamat) }}</textarea>
    @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex justify-content-between">
    <a href="{{ route('dosen.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>