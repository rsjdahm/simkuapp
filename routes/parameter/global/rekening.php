<?php

use App\Http\Controllers\Parameter\Global\RekAkunController;
use App\Http\Controllers\Parameter\Global\RekJenisController;
use App\Http\Controllers\Parameter\Global\RekKelompokController;
use App\Http\Controllers\Parameter\Global\RekObjekController;
use App\Http\Controllers\Parameter\Global\RekRincObjekController;
use App\Http\Controllers\Parameter\Global\RekSubRincObjekController;
use Illuminate\Support\Facades\Route;

/// Rekening indexer
Route::get('/parameter/global/rekening', function () {
    return view('pages.parameter.global.rekening.index');
})->name('rekening.index');

/// rek_akun
Route::resource('/parameter/global/rekening/rek-akun', RekAkunController::class, ['as' => 'rekening']);
/// rek_kelompok
Route::resource('/parameter/global/rekening/rek-kelompok', RekKelompokController::class, ['as' => 'rekening']);
/// rek_jenis
Route::resource('/parameter/global/rekening/rek-jenis', RekJenisController::class, ['as' => 'rekening']);
/// rek_objek
Route::resource('/parameter/global/rekening/rek-objek', RekObjekController::class, ['as' => 'rekening']);
/// rek_rinc_objek
Route::resource('/parameter/global/rekening/rek-rinc-objek', RekRincObjekController::class, ['as' => 'rekening']);
/// rek_sub_rinc_objek
Route::resource('/parameter/global/rekening/rek-sub-rinc-objek', RekSubRincObjekController::class, ['as' => 'rekening']);
