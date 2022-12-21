<?php

use App\Http\Controllers\Anggaran\BelanjaRkaPdController;
use App\Http\Controllers\Anggaran\RkaPdController;
use Illuminate\Support\Facades\Route;

Route::prefix('/anggaran/penganggaran-pd')->group(function () {
    Route::resource('/rka-pd', RkaPdController::class);
    Route::resource('/belanja-rka-pd', BelanjaRkaPdController::class);
});
