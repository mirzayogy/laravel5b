<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Praktikum;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PraktikumController extends Controller
{
    private array $pesan = [
        'periode_id.required' => 'Periode wajib dipilih.',
        'periode_id.exists' => 'Periode yang dipilih tidak ditemukan.',
        'kode.required' => 'Kode wajib diisi.',
        'kode.unique' => 'Kode sudah dipakai praktikum lain.',
        'nama.required' => 'Nama praktikum wajib diisi.',
        'semester.required' => 'Semester wajib dipilih.',
        'semester.in' => 'Semester tidak valid.',
        'sifat.required' => 'Sifat wajib dipilih.',
        'sifat.in' => 'Sifat tidak valid.',
    ];

    public function index()
    {
        $semua_praktikum = Praktikum::with('periode')
            ->orderBy('semester')
            ->orderBy('nama')
            ->get();

        return view('praktikum.index', compact('semua_praktikum'));
    }

    public function create()
    {
        $semua_periode = Periode::orderBy('singkatan', 'desc')->get();

        return view('praktikum.create', compact('semua_periode'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'periode_id' => ['required', 'exists:periode,id'],
            'kode' => ['required', 'string', 'max:10', 'unique:praktikum,kode'],
            'nama' => ['required', 'string', 'max:100'],
            'semester' => ['required', Rule::in(Praktikum::SEMESTER)],
            'sifat' => ['required', Rule::in(Praktikum::SIFAT)],
        ], $this->pesan);

        Praktikum::create($data);

        return redirect()->route('praktikum.index')
            ->with('success', 'Praktikum berhasil ditambahkan.');
    }

    public function edit(Praktikum $praktikum)
    {
        $semua_periode = Periode::orderBy('singkatan', 'desc')->get();

        return view('praktikum.edit', compact('praktikum', 'semua_periode'));
    }

    public function update(Request $request, Praktikum $praktikum)
    {
        $data = $request->validate([
            'periode_id' => ['required', 'exists:periode,id'],
            'kode' => ['required', 'string', 'max:10', 'unique:praktikum,kode,' . $praktikum->id],
            'nama' => ['required', 'string', 'max:100'],
            'semester' => ['required', Rule::in(Praktikum::SEMESTER)],
            'sifat' => ['required', Rule::in(Praktikum::SIFAT)],
        ], $this->pesan);

        $praktikum->update($data);

        return redirect()->route('praktikum.index')
            ->with('success', 'Praktikum berhasil diubah.');
    }

    public function destroy(Praktikum $praktikum)
    {
        $praktikum->delete();

        return redirect()->route('praktikum.index')
            ->with('success', 'Praktikum berhasil dihapus.');
    }
}