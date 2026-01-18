<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
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

    Route::put('/order/{order}/cancel', [OrderController::class, 'cancel']);
});

Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', function () {
        return view('admin.login');
    });

    Route::post('/admin/login', [AuthController::class, 'authenticate']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::post('/admin/logout', [AuthController::class, 'logout']);

    Route::get('/admin/menus', [AdminMenuController::class, 'index']);

    Route::get('/admin/menu/create', function () {
        return view('admin.menu-create');
    });

    Route::post('/admin/menu/create', [AdminMenuController::class, 'store']);

    Route::get('/admin/menu/{menu}', [AdminMenuController::class, 'show']);

    Route::put('/admin/menu/{menu}', [AdminMenuController::class, 'update']);

    Route::delete('/admin/menu/{menu}', [AdminMenuController::class, 'destroy']);

    Route::get('/admin/orders', [AdminOrderController::class, 'index']);

    Route::put('/admin/order/{order}/status', [AdminOrderController::class, 'updateStatus']);

    Route::get('/admin/order/{order}', [AdminOrderController::class, 'show']);
});
