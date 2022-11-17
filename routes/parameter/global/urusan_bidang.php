<?php

use App\Http\Controllers\Parameter\Global\BidangController;
use App\Http\Controllers\Parameter\Global\UrusanController;
use Illuminate\Support\Facades\Route;

/// Urusan - Bidang indexer
Route::get('/parameter/global/urusan-bidang', function () {
    return view('pages.parameter.global.urusan_bidang.index');
})->name('urusan-bidang.index');

/// urusan
Route::resource('/parameter/global/urusan-bidang/urusan', UrusanController::class, ['as' => 'urusan-bidang']);
/// bidang
Route::resource('/parameter/global/urusan-bidang/bidang', BidangController::class, ['as' => 'urusan-bidang']);
