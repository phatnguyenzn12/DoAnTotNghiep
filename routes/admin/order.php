<?php

use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/order')->name('admin.order.')->middleware('check-admin')->controller(OrderController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('show/{id}','show')->name('show');
        Route::get('list-data/{search?}/{record?}', 'filterData')->name('listData');
    }
);
