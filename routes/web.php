<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('admin');

Route::get('/seller', [SellerController::class, 'dashboard'])->name('seller.dashboard')->middleware('seller');

Route::get('/buyer', function () {
    return view('buyer');
})->name('buyer')->middleware('buyer');

Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::get('/seller/items/add', [SellerController::class, 'showAddItemForm'])->name('seller.items.add');
    Route::post('/seller/items', [ItemController::class, 'store'])->name('seller.items.store');
});
