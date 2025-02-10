<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\OrderManager;
use App\Http\Controllers\ProductsManager;
use Illuminate\Support\Facades\Route;

Route::get('/', action: [ProductsManager::class, "home"])->name('home');
Route::get('/search', [ProductsManager::class, "search"])->name('search');

Route::view('/about','static.about')->name('about');
Route::view('/contact','static.contact')->name('contact');
Route::view('/privacy-policy','static.privacy-policy')->name('privacy-policy');
//static routes end

Route::controller(AuthManager::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginPost')->name('login.post');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerPost')->name('register.post');
    Route::get('logout', 'logout')->name('logout');
});

Route::resource('orders', OrderManager::class);

Route::get("/product/{slug}", [ProductsManager::class,"details"])->name("products.details");

Route::middleware(["auth"])->group(function () {
    Route::get("/cart/{id}", [ProductsManager::class,"addToCart"])->name("cart.add");
    Route::get("/cart", [ProductsManager::class,"showCart"])->name("cart.show");
    Route::get("/checkout", [OrderManager::class,"showCheckout"])->name("checkout.show");
    Route::post("/checkout", [OrderManager::class,"checkoutPost"])->name("checkout.post");
});
