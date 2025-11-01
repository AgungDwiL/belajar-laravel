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
    // route lainnya di sini


    //redirect all page invalid to dashboard
    Route::fallback(function(){
        return redirect()->route('admin-dashboard');   
    });
});
Route::get('/add-products', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-products', [ProductController::class, 'store'])->name('products.store');