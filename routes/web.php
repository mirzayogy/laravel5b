<?php

use Illuminate\Support\Facades\Route;

Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/', 'dashboard')->name('dashboard');
Route::view('/tables', 'tables')->name('tables');
Route::view('/datatables', 'datatables')->name('datatables');
Route::view('/edit', 'edit')->name('edit');

Route::resource('periode', \App\Http\Controllers\PeriodeController::class);
