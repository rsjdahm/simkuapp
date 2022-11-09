<?php

use App\Http\Controllers\Parameter\Global\BidangController;
use App\Http\Controllers\Parameter\Global\UrusanController;
use Illuminate\Support\Facades\Route;

/// Urusan - Bidang indexer
Route::get('/parameter/global/urusan_bidang', function () {
    return view('pages.parameter.global.urusan_bidang.index');
})->name('urusan_bidang.index');

/// urusan
Route::resource('/parameter/global/urusan_bidang/urusan', UrusanController::class, ['as' => 'urusan_bidang']);
/// bidang
Route::resource('/parameter/global/urusan_bidang/bidang', BidangController::class, ['as' => 'urusan_bidang']);