<?php

use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/', 'dashboard')->name('dashboard');
Route::view('/tables', 'tables')->name('tables');
Route::view('/datatables', 'datatables')->name('datatables');
Route::view('/edit', 'edit')->name('edit');

Route::resource('periode', PeriodeController::class);
Route::get('/laporan/periode', [PeriodeController::class, 'cetak'])->name('laporan.periode');

Route::resource('prodi', ProdiController::class)->except('show');
Route::get('/laporan/prodi', [ProdiController::class, 'cetak'])->name('laporan.prodi');

Route::resource('praktikum', PraktikumController::class)->except('show');