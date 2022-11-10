<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
    Route::get('/summary', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/test', function () {
        return view('pages.test');
    })->name('test');

    Route::get('/migrate', function () {
        return Artisan::call('migrate');
    });
    Route::get('/migrate/rollback', function () {
        return Artisan::call('migrate:rollback');
    });

    /// Parameter/Global
    require __DIR__ . '/parameter/global/pegawai.php';
    require __DIR__ . '/parameter/global/urusan_bidang.php';
    require __DIR__ . '/parameter/global/program_kegiatan.php';
    require __DIR__ . '/parameter/global/unit_subunit.php';
    require __DIR__ . '/parameter/global/rekening.php';
});
