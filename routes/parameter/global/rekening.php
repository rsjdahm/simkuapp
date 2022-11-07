<?php

use App\Http\Controllers\Parameter\Global\RekAkunController;
use App\Http\Controllers\Parameter\Global\RekeningController;
use App\Http\Controllers\Parameter\Global\RekJenisController;
use App\Http\Controllers\Parameter\Global\RekKelompokController;
use App\Http\Controllers\Parameter\Global\RekObjekController;
use App\Http\Controllers\Parameter\Global\RekRincObjekController;
use App\Http\Controllers\Parameter\Global\RekSubRincObjekController;
use Illuminate\Support\Facades\Route;

/// Rekening
Route::get('/parameter/global/rekening', [RekeningController::class, 'index'])->name('rekening.index');
/// rek_akun
Route::resource('/parameter/global/rekening/rek_akun', RekAkunController::class, ['as' => 'rekening']);
/// rek_kelompok
Route::resource('/parameter/global/rekening/rek_kelompok', RekKelompokController::class, ['as' => 'rekening']);
/// rek_jenis
Route::resource('/parameter/global/rekening/rek_jenis', RekJenisController::class, ['as' => 'rekening']);
/// rek_objek
Route::resource('/parameter/global/rekening/rek_objek', RekObjekController::class, ['as' => 'rekening']);
/// rek_rinc_objek
Route::resource('/parameter/global/rekening/rek_rinc_objek', RekRincObjekController::class, ['as' => 'rekening']);
/// rek_sub_rinc_objek
Route::resource('/parameter/global/rekening/rek_sub_rinc_objek', RekSubRincObjekController::class, ['as' => 'rekening']);
