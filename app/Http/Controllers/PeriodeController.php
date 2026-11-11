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
        $periodes = Periode::all();
        return view('periode.index', compact('periodes'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
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
