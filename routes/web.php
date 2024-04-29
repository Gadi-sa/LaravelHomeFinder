<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

// Only respond to the index and show methods of the ListingController
// it creates multiple routes for the same controller
// Route::resource('listing', ListingController::class)
//     ->only(['index', 'show', 'create', 'store']);

// it will create all the routes for the ListingController except the destroy method
Route::resource('listing', ListingController::class)
->except(['destroy']);

