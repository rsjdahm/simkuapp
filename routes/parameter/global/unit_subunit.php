<?php

use App\Http\Controllers\Parameter\Global\BidangController;
use App\Http\Controllers\Parameter\Global\SubunitController;
use App\Http\Controllers\Parameter\Global\UnitController;
use Illuminate\Support\Facades\Route;

/// Unit - Subunit indexer
Route::get('/parameter/global/unit-subunit', function () {
    return view('pages.parameter.global.unit_subunit.index');
})->name('unit-subunit.index');

/// bidang
Route::get('/parameter/global/urusan-bidang/unit-subunit', [BidangController::class, 'indexUnit'])->name('urusan-bidang.bidang.index_unit');
/// unit
Route::resource('/parameter/global/unit-subunit/unit', UnitController::class, ['as' => 'unit-subunit']);
/// subunit
Route::resource('/parameter/global/unit-subunit/subunit', SubunitController::class, ['as' => 'unit-subunit']);
