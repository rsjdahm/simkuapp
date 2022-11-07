<?php

use App\Http\Controllers\Parameter\Global\PegawaiController;
use Illuminate\Support\Facades\Route;

/// Pegawai
Route::resource('/parameter/global/pegawai', PegawaiController::class);
Route::get('/parameter/global/pegawai-table', [PegawaiController::class, 'table'])->name('pegawai.table');
