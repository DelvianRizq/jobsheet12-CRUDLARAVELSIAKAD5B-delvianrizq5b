<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class MatakuliahController extends Controller
{
    /** Menampilkan halaman utama daftar mata kuliah. */
    public function index(): View
    {
        return view('matakuliah.index');
    }

    /** Endpoint JSON khusus untuk Yajra DataTables Server-Side. */
    public function data(): JsonResponse
    {
        $query = Matakuliah::query()->select(['id', 'kode_mk', 'nama_mk', 'sks']);

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('aksi', function (Matakuliah $matakuliah) {
                return view('matakuliah._aksi', compact('matakuliah'))->render();
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    /** Menampilkan form tambah mata kuliah. */
    public function create(): View
    {
        return view('matakuliah.create', ['matakuliah' => new Matakuliah()]);
    }

    /** Menyimpan data mata kuliah baru ke database. */
    public function store(Request $request): RedirectResponse
    {
        $matakuliah = Matakuliah::create($this->validated($request));

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah ' . $matakuliah->nama_mk . ' berhasil ditambahkan.');
    }

    /** Menampilkan detail satu mata kuliah. */
    public function show(Matakuliah $matakuliah): View
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    /** Menampilkan form ubah mata kuliah. */
    public function edit(Matakuliah $matakuliah): View
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /** Menyimpan perubahan data mata kuliah ke database. */
    public function update(Request $request, Matakuliah $matakuliah): RedirectResponse
    {
        $matakuliah->update($this->validated($request, $matakuliah));

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah ' . $matakuliah->nama_mk . ' berhasil diperbarui.');
    }

    /** Menghapus data mata kuliah dari database via AJAX. */
    public function destroy(Matakuliah $matakuliah): JsonResponse
    {
        try {
            $matakuliah->delete();
        } catch (QueryException $e) {
            // Mencegah error 500 jika mata kuliah sudah digunakan di tabel KRS Detail (Foreign Key)
            return response()->json([
                'message' => 'Data mata kuliah tidak dapat dihapus: masih dipakai pada KRS mahasiswa.',
            ], 409);
        }

        return response()->json([
            'message' => 'Data mata kuliah ' . $matakuliah->nama_mk . ' berhasil dihapus.',
        ]);
    }

    /** Aturan validasi bersama untuk store dan update. */
    private function validated(Request $request, ?Matakuliah $matakuliah = null): array
    {
        return $request->validate(
            [
                'kode_mk' => ['required', 'string', 'max:10', Rule::unique(Matakuliah::class, 'kode_mk')->ignore($matakuliah?->id)],
                'nama_mk' => ['required', 'string', 'max:100'],
                'sks' => ['required', 'integer', 'min:1', 'max:6'],
            ],
            [
                'kode_mk.required' => 'Kode mata kuliah wajib diisi.',
                'kode_mk.max' => 'Kode mata kuliah maksimal 10 karakter.',
                'kode_mk.unique' => 'Kode mata kuliah sudah dipakai.',
                'nama_mk.required' => 'Nama mata kuliah wajib diisi.',
                'nama_mk.max' => 'Nama mata kuliah maksimal 100 karakter.',
                'sks.required' => 'Jumlah SKS wajib diisi.',
                'sks.integer' => 'SKS harus berupa angka.',
                'sks.min' => 'SKS minimal 1.',
                'sks.max' => 'SKS maksimal 6.',
            ]
        );
    }
}