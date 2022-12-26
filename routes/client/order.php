<?php

use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\PaypalController;
use Illuminate\Support\Facades\Route;

Route::prefix('order')->name('client.order.')->middleware('check-user')->controller(OrderController::class)->group(
    function () {
        Route::get('cart-list', 'cartList')->name('cartList');
        Route::post('add-to-cart/{course}', 'addToCart')->name('addToCart');
        Route::get('cart-remove/{id}', 'removeCart')->name('cartRemove');
        Route::get('payment', 'pay')->name('pay')->middleware('check-out');
        Route::post('check-code', 'checkCode')->name('checkCode')->middleware('check-out');
        Route::post('payment', 'handlePay')->name('handlePay')->middleware('check-out');
        Route::post('payment-vnpay', 'vnpay')->name('vnpay')->middleware('check-out');
        Route::get('return-data-vnpay', 'resDataVnpay')->name('resvnpay');
    }
);
