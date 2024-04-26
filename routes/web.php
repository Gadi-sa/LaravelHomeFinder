<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

// Only respond to the index and show methods of the ListingController
Route::resource('listing', ListingController::class)
    ->only(['index', 'show', 'create', 'store']);


