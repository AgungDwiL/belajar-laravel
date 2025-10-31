<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('guest.home');
});

Route::view('/login', 'guest.login');
Route::view('/register', 'guest.register');

Route::get('/add-products', function () {
    return view('add-products');
});

Route::get('/products', 'ProductController@index');
Route::get('/add-products', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-products', [ProductController::class, 'store'])->name('products.store');