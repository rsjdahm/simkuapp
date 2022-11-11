<?php

use App\Http\Controllers\Admin\Database\MigrationController;
use Illuminate\Support\Facades\Route;

/// Migration
Route::get('/admin/database/migration', [MigrationController::class, 'index'])->name('migration.index');
Route::post('/admin/database/migration/{migration}', [MigrationController::class, 'store'])->name('migration.store');
Route::get('/admin/database/migration/{migration}/edit', [MigrationController::class, 'edit'])->name('migration.edit');
Route::put('/admin/database/migration/{migration}', [MigrationController::class, 'update'])->name('migration.update');
Route::delete('/admin/database/migration/{migration}', [MigrationController::class, 'destroy'])->name('migration.destroy');
