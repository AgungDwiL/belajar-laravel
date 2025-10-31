<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Guest page
Route::view('/', ('guest.home'));
Route::view('/login', 'guest.login');
Route::view('/register', 'guest.register');

Route::get('/add-products', function () {
    return view('add-products');
});

// Admin page
Route::view('/admin/dashboard','admin.dashboard');
Route::get('/products', 'ProductController@index');
Route::get('/add-products', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-products', [ProductController::class, 'store'])->name('products.store');