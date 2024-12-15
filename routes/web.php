<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\SearchController;

// For Testing purposes
Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show'])
    ->middleware('auth');

// Listing Routes
// Protected listing actions
Route::resource('listing', ListingController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

// Public listing actions
Route::resource('listing', ListingController::class)
    ->except(['create', 'store', 'edit', 'update', 'destroy']);

// Auth Routes
Route::get('login', [AuthController::class, 'create'])
    ->name('login');
Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])
    ->name('logout');

// User Account Routes
Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);

// Search Routes
Route::get('search', [SearchController::class, 'index'])
    ->name('search.index');
