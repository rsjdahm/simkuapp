<?php

use App\Http\Controllers\Parameter\Global\BidangController;
use App\Http\Controllers\Parameter\Global\KegiatanController;
use App\Http\Controllers\Parameter\Global\ProgramController;
use App\Http\Controllers\Parameter\Global\SubkegiatanController;
use Illuminate\Support\Facades\Route;

/// Program - Kegiatan indexer
Route::get('/parameter/global/program_kegiatan', function () {
    return view('pages.parameter.global.program_kegiatan.index');
})->name('program_kegiatan.index');

/// bidang
Route::get('/parameter/global/urusan_bidang/program_kegiatan', [BidangController::class, 'indexProgram'])->name('urusan_bidang.bidang.index_program');
/// program
Route::resource('/parameter/global/program_kegiatan/program', ProgramController::class, ['as' => 'program_kegiatan']);
/// kegiatan
Route::resource('/parameter/global/program_kegiatan/kegiatan', KegiatanController::class, ['as' => 'program_kegiatan']);
/// subkegiatan
Route::resource('/parameter/global/program_kegiatan/subkegiatan', SubkegiatanController::class, ['as' => 'program_kegiatan']);
