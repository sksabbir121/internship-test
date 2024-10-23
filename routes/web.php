<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');



