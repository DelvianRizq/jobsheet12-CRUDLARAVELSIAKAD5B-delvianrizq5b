<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class KrsController extends Controller
{
    /** Menampilkan halaman utama daftar KRS. */
    public function index(): View
    {
        return view('krs.index');
    }

    /** Endpoint JSON khusus untuk Yajra DataTables Server-Side. */
    public function data(): JsonResponse
    {
        $query = Krs::with('mahasiswa')
            ->select([
                'krs.id',
                'krs.mahasiswa_id',
                'krs.tahun_akademik',
                'krs.semester',
                'krs.status',
            ]);

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('nim', function (Krs $krs) {
                return $krs->mahasiswa->nim ?? '-';
            })
            ->addColumn('nama_mahasiswa', function (Krs $krs) {
                return $krs->mahasiswa->nama ?? '-';
            })
            ->addColumn('jumlah_mk', function (Krs $krs) {
                return $krs->details()->count() . ' MK';
            })
            ->addColumn('total_sks', function (Krs $krs) {
                return $krs->mataKuliah()->sum('sks') . ' SKS';
            })
            ->addColumn('aksi', function (Krs $krs) {
                return view('krs._aksi', compact('krs'))->render();
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    /** Menampilkan form tambah KRS. */
    public function create(): View
    {
        $mahasiswa = Mahasiswa::orderBy('nama', 'asc')->get();
        $matakuliah = Matakuliah::orderBy('kode_mk', 'asc')->get();

        return view('krs.create', [
            'krs' => new Krs(),
            'mahasiswa' => $mahasiswa,
            'matakuliah' => $matakuliah,
            'selectedMataKuliah' => [],
        ]);
    }

    /** Menyimpan data KRS beserta detail mata kuliah ke database. */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validated($request);

        DB::transaction(function () use ($validatedData, $request) {
            $krs = Krs::create([
                'mahasiswa_id' => $validatedData['mahasiswa_id'],
                'tahun_akademik' => $validatedData['tahun_akademik'],
                'semester' => $validatedData['semester'],
                'status' => $validatedData['status'],
            ]);

            if (!empty($request->mata_kuliah_ids)) {
                foreach ($request->mata_kuliah_ids as $mkId) {
                    KrsDetail::create([
                        'krs_id' => $krs->id,
                        'mata_kuliah_id' => $mkId,
                    ]);
                }
            }
        });

        return redirect()
            ->route('krs.index')
            ->with('success', 'Data KRS berhasil ditambahkan.');
    }

    /** Menampilkan detail satu KRS. */
    public function show(Krs $krs): View
    {
        $krs->load(['mahasiswa', 'mataKuliah']);

        return view('krs.show', compact('krs'));
    }

    /** Menampilkan form ubah KRS. */
    public function edit(Krs $krs): View
    {
        $mahasiswa = Mahasiswa::orderBy('nama', 'asc')->get();
        $matakuliah = Matakuliah::orderBy('kode_mk', 'asc')->get();
        $selectedMataKuliah = $krs->mataKuliah()->pluck('mata_kuliah_id')->toArray();

        return view('krs.edit', compact('krs', 'mahasiswa', 'matakuliah', 'selectedMataKuliah'));
    }

    /** Menyimpan perubahan data KRS beserta detail mata kuliah. */
    public function update(Request $request, Krs $krs): RedirectResponse
    {
        $validatedData = $this->validated($request, $krs);

        DB::transaction(function () use ($krs, $validatedData, $request) {
            $krs->update([
                'mahasiswa_id' => $validatedData['mahasiswa_id'],
                'tahun_akademik' => $validatedData['tahun_akademik'],
                'semester' => $validatedData['semester'],
                'status' => $validatedData['status'],
            ]);

            // Synchronize detail mata kuliah
            KrsDetail::where('krs_id', $krs->id)->delete();

            if (!empty($request->mata_kuliah_ids)) {
                foreach ($request->mata_kuliah_ids as $mkId) {
                    KrsDetail::create([
                        'krs_id' => $krs->id,
                        'mata_kuliah_id' => $mkId,
                    ]);
                }
            }
        });

        return redirect()
            ->route('krs.index')
            ->with('success', 'Data KRS berhasil diperbarui.');
    }

    /** Menghapus data KRS beserta detailnya via AJAX. */
    public function destroy(Krs $krs): JsonResponse
    {
        try {
            DB::transaction(function () use ($krs) {
                KrsDetail::where('krs_id', $krs->id)->delete();
                $krs->delete();
            });
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Data KRS gagal dihapus karena terikat dengan data lain.',
            ], 409);
        }

        return response()->json([
            'message' => 'Data KRS berhasil dihapus.',
        ]);
    }

    /** 
     * Aturan validasi bersama untuk store dan update.
     * Mengimplementasikan FITUR TAMBAHAN 7: Validasi Batas Maksimal SKS.
     */
    private function validated(Request $request, ?Krs $krs = null): array
    {
        // 1. Validasi dasar input form
        $validated = $request->validate(
            [
                'mahasiswa_id' => [
                    'required',
                    'exists:mahasiswa,id',
                    Rule::unique('krs', 'mahasiswa_id')
                        ->where(fn ($query) => $query->where('tahun_akademik', $request->tahun_akademik)
                                                    ->where('semester', $request->semester))
                        ->ignore($krs?->id),
                ],
                'tahun_akademik' => ['required', 'string', 'max:9', 'regex:/^\d{4}\/\d{4}$/'],
                'semester' => ['required', Rule::in(['Ganjil', 'Genap'])],
                'status' => ['required', Rule::in(['draft', 'diajukan', 'disetujui', 'ditolak'])],
                'mata_kuliah_ids' => ['required', 'array', 'min:1'],
                'mata_kuliah_ids.*' => ['exists:mata_kuliah,id'],
            ],
            [
                'mahasiswa_id.required' => 'Mahasiswa wajib dipilih.',
                'mahasiswa_id.exists' => 'Mahasiswa tidak valid.',
                'mahasiswa_id.unique' => 'Mahasiswa sudah memiliki KRS pada tahun akademik dan semester ini.',
                'tahun_akademik.required' => 'Tahun akademik wajib diisi.',
                'tahun_akademik.regex' => 'Format tahun akademik harus YYYY/YYYY (contoh: 2024/2025).',
                'semester.required' => 'Semester wajib dipilih.',
                'semester.in' => 'Semester harus Ganjil atau Genap.',
                'status.required' => 'Status KRS wajib dipilih.',
                'status.in' => 'Status KRS tidak valid.',
                'mata_kuliah_ids.required' => 'Minimal pilih 1 mata kuliah.',
                'mata_kuliah_ids.array' => 'Pilihan mata kuliah harus berupa daftar.',
                'mata_kuliah_ids.min' => 'Minimal pilih 1 mata kuliah.',
                'mata_kuliah_ids.*.exists' => 'Salah satu mata kuliah yang dipilih tidak valid.',
            ]
        );

        // 2. Logika Fitur 7: Hitung jumlah SKS dari mata kuliah yang dicentang
        $totalSks = Matakuliah::whereIn('id', $request->mata_kuliah_ids ?? [])->sum('sks');

        // 3. Batasi total SKS maksimal 24 SKS (FITUR TAMBAHAN 7)
        if ($totalSks > 24) {
            throw ValidationException::withMessages([
                'mata_kuliah_ids' => ["Total SKS yang dipilih ($totalSks SKS) melebihi batas maksimal yang diperbolehkan (Maksimal 24 SKS)."],
            ]);
        }

        return $validated;
    }
}