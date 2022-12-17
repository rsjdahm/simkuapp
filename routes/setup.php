<?php

use App\Http\Controllers\Setup\BidangController;
use App\Http\Controllers\Setup\KegiatanController;
use App\Http\Controllers\Setup\ProgramController;
use App\Http\Controllers\Setup\RekAkunController;
use App\Http\Controllers\Setup\RekJenisController;
use App\Http\Controllers\Setup\RekKelompokController;
use App\Http\Controllers\Setup\RekObjekController;
use App\Http\Controllers\Setup\SubKegiatanController;
use App\Http\Controllers\Setup\UrusanController;
use Illuminate\Support\Facades\Route;

Route::prefix('/setup/nomenklatur')->group(function () {
    Route::resource('/urusan', UrusanController::class);
    Route::resource('/bidang', BidangController::class);
    Route::resource('/program', ProgramController::class);
    Route::resource('/kegiatan', KegiatanController::class);
    Route::resource('/sub-kegiatan', SubKegiatanController::class);
});

Route::prefix('/setup/rekening')->group(function () {
    Route::resource('/rek-akun', RekAkunController::class);
    Route::resource('/rek-kelompok', RekKelompokController::class);
    Route::resource('/rek-jenis', RekJenisController::class);
    Route::resource('/rek-objek', RekObjekController::class);
});
