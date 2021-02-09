<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);
