<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'tahun_akademik',
        'semester',
        'status',
    ];

    /** Relasi ke Mahasiswa (Setiap KRS milik 1 Mahasiswa). */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    /** Relasi ke KrsDetail. */
    public function details(): HasMany
    {
        return $this->hasMany(KrsDetail::class, 'krs_id');
    }

    /** Relasi langsung ke MataKuliah melalui KrsDetail. */
    public function mataKuliah(): BelongsToMany
    {
        return $this->belongsToMany(Matakuliah::class, 'krs_detail', 'krs_id', 'mata_kuliah_id');
    }
}