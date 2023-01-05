<?php

use App\Http\Controllers\Penatausahaan\BankController;
use App\Http\Controllers\Penatausahaan\BuktiGuController;
use App\Http\Controllers\Penatausahaan\BuktiSpjGuController;
use App\Http\Controllers\Penatausahaan\PenandatanganController;
use App\Http\Controllers\Penatausahaan\PenetapanUpController;
use App\Http\Controllers\Penatausahaan\PotonganBuktiGuController;
use App\Http\Controllers\Penatausahaan\PotonganPfkController;
use App\Http\Controllers\Penatausahaan\SpjGuController;
use Illuminate\Support\Facades\Route;

Route::prefix('/penatausahaan')->group(function () {
    Route::resource('/bank', BankController::class);
    Route::resource('/potongan-pfk', PotonganPfkController::class);
    Route::resource('/penandatangan', PenandatanganController::class);

    Route::resource('/penetapan-up', PenetapanUpController::class);
    Route::get('/print-spp/penetapan-up/{penetapan_up}', [PenetapanUpController::class, 'printPdfSpp'])->name('penetapan-up.pdf-spp');

    Route::resource('/bukti-gu', BuktiGuController::class);
    Route::get('/print-sbpb/bukti-gu/{bukti_gu}', [BuktiGuController::class, 'printPdfSbpb'])->name('bukti-gu.pdf-sbpb');
    Route::get('/print-kwitansi/bukti-gu/{bukti_gu}', [BuktiGuController::class, 'printPdfKwitansi'])->name('bukti-gu.pdf-kwitansi');

    Route::resource('/spj-gu', SpjGuController::class);
    Route::resource('/bukti-spj-gu', BuktiSpjGuController::class);

    Route::resource('/potongan-bukti-gu', PotonganBuktiGuController::class);
});
