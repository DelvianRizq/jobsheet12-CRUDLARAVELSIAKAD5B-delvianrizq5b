<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    /** Menampilkan halaman utama daftar mahasiswa. */
    public function index(): View
    {
        return view('mahasiswa.index');
    }

    /** Endpoint JSON Yajra DataTables Server-Side Mahasiswa (termasuk Soft Delete) */
    public function data(): JsonResponse
    {
        // Menggunakan withTrashed() agar data yang di-soft delete tetap terbawa ke DataTables
        $query = Mahasiswa::withTrashed()->select(['id', 'nim', 'nama', 'email', 'jenis_kelamin', 'deleted_at']);

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('aksi', function (Mahasiswa $mahasiswa) {
                return view('mahasiswa._aksi', compact('mahasiswa'))->render();
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    /** Memulihkan data mahasiswa yang di-soft delete */
    public function restore(int $id): JsonResponse
    {
        $mahasiswa = Mahasiswa::withTrashed()->findOrFail($id);
        $mahasiswa->restore();

        return response()->json([
            'message' => "Data mahasiswa {$mahasiswa->nama} berhasil dipulihkan.",
        ]);
    }

    /** Menampilkan form tambah mahasiswa. */
    public function create(): View
    {
        return view('mahasiswa.create', ['mahasiswa' => new Mahasiswa()]);
    }

    /** Menyimpan data mahasiswa baru ke database. */
    public function store(Request $request): RedirectResponse
    {
        $mahasiswa = Mahasiswa::create($this->validated($request));

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa ' . $mahasiswa->nama . ' berhasil ditambahkan.');
    }

    /** Menampilkan detail satu data mahasiswa. */
    public function show(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /** Menampilkan form ubah data mahasiswa. */
    public function edit(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /** Menyimpan perubahan data mahasiswa ke database. */
    public function update(Request $request, Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->update($this->validated($request, $mahasiswa));

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa ' . $mahasiswa->nama . ' berhasil diperbarui.');
    }

    /** Menghapus data mahasiswa dari database via AJAX. */
    public function destroy(Mahasiswa $mahasiswa): JsonResponse
    {
        try {
            $mahasiswa->delete();
        } catch (QueryException $e) {
            // Mencegah error 500 jika data mahasiswa masih terikat di tabel KRS (Foreign Key)
            return response()->json([
                'message' => 'Data mahasiswa tidak dapat dihapus: masih dipakai data lain.',
            ], 409);
        }

        return response()->json([
            'message' => 'Data mahasiswa ' . $mahasiswa->nama . ' berhasil dihapus.',
        ]);
    }

    /** Aturan validasi bersama untuk store dan update. */
    private function validated(Request $request, ?Mahasiswa $mahasiswa = null): array
    {
        return $request->validate(
            [
                'nim' => ['required', 'string', 'max:15', Rule::unique(Mahasiswa::class, 'nim')->ignore($mahasiswa?->id)],
                'nama' => ['required', 'string', 'max:100'],
                'jenis_kelamin' => ['required', Rule::in(['L', 'P'])],
                'email' => ['required', 'email', 'max:100', Rule::unique(Mahasiswa::class, 'email')->ignore($mahasiswa?->id)],
                'angkatan' => ['required', 'numeric', 'digits:4'],
                'program_studi' => ['required', 'string', 'max:100'],
            ],
            [
                'nim.required' => 'NIM wajib diisi.',
                'nim.max' => 'NIM maksimal 15 karakter.',
                'nim.unique' => 'NIM sudah dipakai mahasiswa lain.',
                'nama.required' => 'Nama mahasiswa wajib diisi.',
                'nama.max' => 'Nama mahasiswa maksimal 100 karakter.',
                'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah dipakai mahasiswa lain.',
                'angkatan.required' => 'Angkatan wajib diisi.',
                'angkatan.digits' => 'Angkatan harus berupa 4 digit tahun.',
                'program_studi.required' => 'Program studi wajib diisi.',
            ]
        );
    }
}