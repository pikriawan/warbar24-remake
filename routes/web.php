<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\EnsureCustomerExists;
use App\Http\Middleware\EnsureCustomerHasCart;
use Illuminate\Support\Facades\Route;

Route::middleware([EnsureCustomerExists::class, EnsureCustomerHasCart::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/menus', [MenuController::class, 'index']);

    Route::get('/cart', [CartController::class, 'index']);

    Route::post('/cart', [CartController::class, 'store']);

    Route::post('/checkout', [CheckoutController::class, 'store']);

    Route::get('/orders', [OrderController::class, 'index']);

    Route::get('/order/{order}', [OrderController::class, 'show']);
});
