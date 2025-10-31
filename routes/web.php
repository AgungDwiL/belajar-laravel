<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('guest.home');
});

Route::get('/add-products', function () {
    return view('add-products');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/add-products', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-products', [ProductController::class, 'store'])->name('products.store');