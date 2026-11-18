<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class ProdiController extends Controller
{

    private function aturan(?Prodi $prodi = null): array
    {
        return [
            'kode_prodi' => ['required', 'string', 'max:10', 'unique:prodi,kode_prodi,' . $prodi?->id],
            'nama_prodi' => ['required', 'string', 'max:100'],
            'nama_kaprodi' => ['required', 'string', 'max:100'],
        ];
    }

    private array $pesan = [
        'kode_prodi.required' => 'Kode prodi wajib diisi.',
        'kode_prodi.unique' => 'Kode prodi sudah dipakai.',
        'nama_prodi.required' => 'Nama prodi wajib diisi.',
        'nama_kaprodi.required' => 'Nama kaprodi wajib diisi.',
    ];


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semua_prodi = Prodi::orderBy('kode_prodi')->get();

        return view('prodi.index', compact('semua_prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Prodi::create($request->validate($this->aturan(), $this->pesan));

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $prodi->update($request->validate($this->aturan($prodi), $this->pesan));

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus.');
    }

    public function cetak()
    {
        $semua_prodi = Prodi::orderBy('kode_prodi')->get();

        $pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', [15, 10, 15, 10]);
        $pdf->pdf->SetTitle('Laporan Program Studi');
        $pdf->writeHTML(view('prodi.cetak', compact('semua_prodi'))->render());

        return response($pdf->output('laporan-prodi.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="laporan-prodi.pdf"');
    }
}
