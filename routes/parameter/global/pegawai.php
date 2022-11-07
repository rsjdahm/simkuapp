<?php

use App\Http\Controllers\Parameter\Global\PegawaiController;
use Illuminate\Support\Facades\Route;

/// Pegawai
Route::resource('/parameter/global/pegawai', PegawaiController::class);
