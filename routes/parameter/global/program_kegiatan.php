<?php

use App\Http\Controllers\Parameter\Global\BidangController;
use App\Http\Controllers\Parameter\Global\KegiatanController;
use App\Http\Controllers\Parameter\Global\ProgramController;
use App\Http\Controllers\Parameter\Global\SubkegiatanController;
use Illuminate\Support\Facades\Route;

/// Program - Kegiatan indexer
Route::get('/parameter/global/program-kegiatan', function () {
    return view('pages.parameter.global.program_kegiatan.index');
})->name('program-kegiatan.index');

/// bidang
Route::get('/parameter/global/urusan-bidang/program-kegiatan', [BidangController::class, 'indexProgram'])->name('urusan-bidang.bidang.index_program');
/// program
Route::resource('/parameter/global/program-kegiatan/program', ProgramController::class, ['as' => 'program-kegiatan']);
/// kegiatan
Route::resource('/parameter/global/program-kegiatan/kegiatan', KegiatanController::class, ['as' => 'program-kegiatan']);
/// subkegiatan
Route::resource('/parameter/global/program-kegiatan/subkegiatan', SubkegiatanController::class, ['as' => 'program-kegiatan']);
