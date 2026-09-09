<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;

Route::get('/', [InformationController::class, 'index'])->name('information.index');
Route::resource('information', InformationController::class)->except(['index']);