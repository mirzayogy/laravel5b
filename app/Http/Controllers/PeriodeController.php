<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semua_periode = Periode::all();
        return view('periode.index', compact('semua_periode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'periode' => ['required', 'string', 'max:16', 'min:15', 'unique:periode,periode'],
            'singkatan' => ['required', 'numeric', 'unique:periode,singkatan'],
        ], [
            'periode.required' => 'Nama periode wajib diisi.',
            'periode.max' => 'Periode maksimal 16 karakter.',
            'periode.min' => 'Periode minimal 15 karakter.',
            'periode.unique' => 'Periode sudah ada.',
            'singkatan.required' => 'Singkatan wajib diisi.',
            'singkatan.numeric' => 'Singkatan harus berupa angka.',
            'singkatan.unique' => 'Singkatan sudah dipakai periode lain.',
        ]);

        $data['status'] = $request->boolean('status');

        Periode::create($data); // ini perintah tambah data ke database, data yang ditambahkan sesuai dengan isi variabel $data

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        return view('periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {
        $data = $request->validate([
            'periode' => ['required', 'string', 'max:16', 'min:15', 'unique:periode,periode,' . $periode->id],
            'singkatan' => ['required', 'numeric', 'size:3', 'unique:periode,singkatan,' . $periode->id],
        ], [
            'periode.required' => 'Nama periode wajib diisi.',
            'periode.max' => 'Periode maksimal 16 karakter.',
            'periode.min' => 'Periode minimal 15 karakter.',
            'periode.unique' => 'Periode sudah ada.',
            'singkatan.required' => 'Singkatan wajib diisi.',
            'singkatan.numeric' => 'Singkatan harus berupa angka.',
            'singkatan.size' => 'Singkatan harus 3 karakter.',
            'singkatan.unique' => 'Singkatan sudah dipakai periode lain.',
        ]);

        $data['status'] = $request->boolean('status');

        $periode->update($data);

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();

        return redirect()->route('periode.index')
            ->with('success', 'Periode berhasil dihapus.');
    }

    public function cetak()
    {
        $semua_periode = Periode::orderBy('singkatan')->get();

        // 1. Ubah view Blade menjadi teks HTML
        $html = view('periode.cetak', compact('semua_periode'))->render();

        // 2. Siapkan PDF: orientasi, ukuran kertas, bahasa, unicode, encoding, margin (kiri, atas, kanan, bawah) dalam mm
        $pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', [15, 10, 15, 10]);
        $pdf->pdf->SetTitle('Laporan Data Periode');

        // 3. Tulis HTML ke PDF
        $pdf->writeHTML($html);

        // 4. Kirim ke browser
        return response($pdf->output('laporan-periode.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="laporan-periode.pdf"');
    }
}
