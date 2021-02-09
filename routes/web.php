<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);
Route::get('/import', [ImportController::class, 'index'])->name('import.index');
Route::post('/import', [ImportController::class, 'upload'])->name('import.upload');