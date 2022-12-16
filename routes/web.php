<?php

use App\Http\Controllers\Admin\MigrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\Anggaran\AktivitasController;
use App\Http\Controllers\Main\Anggaran\KegiatanRkaController;
use App\Http\Controllers\Main\Anggaran\ProgramRkaController;
use App\Http\Controllers\Main\Anggaran\RkaController;
use App\Http\Controllers\Main\Anggaran\SubkegiatanRkaController;
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
    Route::get('/menu-modul/{modul?}', function ($modul = 'setup') {
        return view('components.menus.' . $modul);
    })->name('menu-modul');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/ringkasan', [DashboardController::class, 'show'])->name('dashboard.show');


    require __DIR__ . '/setup.php';

    // ADMIN
    Route::prefix('/admin')->group(function () {
        Route::get('/migration', [MigrationController::class, 'index'])->name('migration.index');
        Route::post('/migration/{migration}', [MigrationController::class, 'store'])->name('migration.store');
        Route::get('/migration/{migration}/edit', [MigrationController::class, 'edit'])->name('migration.edit');
        Route::put('/migration/{migration}', [MigrationController::class, 'update'])->name('migration.update');
        Route::delete('/migration/{migration}', [MigrationController::class, 'destroy'])->name('migration.destroy');
    });
});
