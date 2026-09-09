<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicInformationController;
use App\Http\Controllers\AdminInformationController;

// Public Routes (Read-Only)
Route::get('/', [PublicInformationController::class, 'index'])->name('public.index');
Route::get('/info/{id}', [PublicInformationController::class, 'show'])->name('public.show');

// Admin Routes (CRUD)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('information', AdminInformationController::class);
});