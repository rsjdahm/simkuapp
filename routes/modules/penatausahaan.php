<?php

use App\Http\Controllers\Penatausahaan\BankController;
use App\Http\Controllers\Penatausahaan\BuktiGuController;
use Illuminate\Support\Facades\Route;

Route::prefix('/penatausahaan/belanja')->group(function () {
    Route::resource('/bank', BankController::class);
    Route::resource('/bukti-gu', BuktiGuController::class);
});
