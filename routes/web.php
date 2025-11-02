<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Guest page
Route::view('/', ('guest.home'));
Route::view('/login', 'guest.login');
Route::view('/register', 'guest.register');
Route::get('/products', 'ProductController@show');

Route::get('/add-products', function () {
    return view('add-products');
});

// Admin page
Route::prefix('admin')->group(function(){
    Route::view('','admin.dashboard')->name('admin-dashboard');
    Route::get('products', 'ProductController@index');
    Route::get('product/create', 'ProductController@create');
    Route::post('product/store', 'ProductController@store');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::patch('product/update/{id}', 'ProductController@update');
    Route::delete('product/delete/{id}', 'ProductController@destroy');

    Route::get('brands', 'BrandController@index');
    Route::get('brand/create', 'BrandController@create');
    Route::post('brand/store', 'BrandController@store');
    Route::get('brand/edit/{id}', 'BrandController@edit');
    Route::patch('brand/update/{id}', 'BrandController@update');
    Route::delete('brand/delete/{id}', 'BrandController@destroy');
    // route lainnya di sini


    //redirect all page invalid to dashboard
    Route::fallback(function(){
        return redirect()->route('admin-dashboard');   
    });
});