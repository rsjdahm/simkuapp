<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parameter\Global\BidangController;
use App\Http\Controllers\Parameter\Global\KegiatanController;
use App\Http\Controllers\Parameter\Global\PegawaiController;
use App\Http\Controllers\Parameter\Global\ProgramController;
use App\Http\Controllers\Parameter\Global\RekAkunController;
use App\Http\Controllers\Parameter\Global\RekJenisController;
use App\Http\Controllers\Parameter\Global\RekKelompokController;
use App\Http\Controllers\Parameter\Global\RekObjekController;
use App\Http\Controllers\Parameter\Global\RekRincObjekController;
use App\Http\Controllers\Parameter\Global\RekSubRincObjekController;
use App\Http\Controllers\Parameter\Global\SubkegiatanController;
use App\Http\Controllers\Parameter\Global\SubunitController;
use App\Http\Controllers\Parameter\Global\UnitController;
use App\Http\Controllers\Parameter\Global\UrusanController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/ringkasan', [DashboardController::class, 'show'])->name('dashboard.show');

    Route::get('/test', function () {
        return view('pages.test');
    })->name('test');

    /// PARAMETER - GLOBAL
    Route::prefix('/parameter/global')->group(function () {
        /// Pegawai
        Route::resource('/pegawai', PegawaiController::class); //->name('pegawai.*');
        Route::get('/pegawai-table', [PegawaiController::class, 'table'])->name('pegawai.table');

        /// Urusan-Bidang
        Route::get('/urusan-bidang', function () {
            return view('pages.parameter.global.urusan-bidang.index');
        })->name('urusan-bidang.index');
        Route::resource('/urusan-bidang/urusan', UrusanController::class)->except(['show']); //->name('urusan.*');
        Route::resource('/urusan-bidang/bidang', BidangController::class)->except(['show']); //->name('bidang.*');
        Route::get('/urusan-bidang/program-kegiatan', [BidangController::class, 'indexProgram'])->name('bidang.program.index');
        Route::get('/urusan-bidang/unit-subunit', [BidangController::class, 'indexUnit'])->name('bidang.unit.index');

        /// Program-Kegiatan
        Route::get('/program-kegiatan', function () {
            return view('pages.parameter.global.program-kegiatan.index');
        })->name('program-kegiatan.index');
        Route::resource('/program-kegiatan/program', ProgramController::class)->except(['show']); //->name('program.*');
        Route::resource('/program-kegiatan/kegiatan', KegiatanController::class)->except(['show']); //->name('kegiatan.*');
        Route::resource('/program-kegiatan/subkegiatan', SubkegiatanController::class)->except(['show']); //->name('subkegiatan.*');

        /// Unit-Subunit
        Route::get('/unit-subunit', function () {
            return view('pages.parameter.global.unit-subunit.index');
        })->name('unit-subunit.index');
        Route::resource('/unit-subunit/unit', UnitController::class)->except(['show']); //->name('unit.*');
        Route::resource('/unit-subunit/subunit', SubunitController::class)->except(['show']); //->name('subunit.*');

        // Rekening
        Route::get('/rekening', function () {
            return view('pages.parameter.global.rekening.index');
        })->name('rekening.index');
        Route::resource('/rekening/rek-akun', RekAkunController::class)->except(['show']); //->name('rek-akun.*');
        Route::resource('/rekening/rek-kelompok', RekKelompokController::class)->except(['show']); //->name('rek-kelompok.*');
        Route::resource('/rekening/rek-jenis', RekJenisController::class)->except(['show']); //->name('rek-jenis.*');
        Route::resource('/rekening/rek-objek', RekObjekController::class)->except(['show']); //->name('rek-objek.*');
        Route::resource('/rekening/rek-rinc-objek', RekRincObjekController::class)->except(['show']); //->name('rek-rinc-objek.*');
        Route::resource('/rekening/rek-sub-rinc-objek', RekSubRincObjekController::class)->except(['show']); //->name('rek-sub-rinc-objek.*');

    });

    /// Admin/Database
    require __DIR__ . '/admin/database/migration.php';
});
