<?php

use App\Http\Controllers\Setup\BidangController;
use App\Http\Controllers\Setup\ProgramController;
use App\Http\Controllers\Setup\UrusanController;
use Illuminate\Support\Facades\Route;

Route::prefix('/setup')->group(function () {
    Route::resource('/urusan', UrusanController::class);
    Route::resource('/bidang', BidangController::class);
    Route::resource('/program', ProgramController::class);
});
