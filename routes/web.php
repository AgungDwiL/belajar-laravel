<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/add-products', function () {
    return view('add-products');
});

Route::get('/products', function () {
    return view('products');
});