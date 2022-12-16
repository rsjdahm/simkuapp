<?php

use App\Http\Controllers\Setup\UrusanController;
use Illuminate\Support\Facades\Route;

Route::prefix('/setup')->group(function () {
    Route::resource('/urusan', UrusanController::class);
});
