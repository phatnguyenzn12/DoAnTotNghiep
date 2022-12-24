<?php

use App\Http\Controllers\Client\AccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('account')->name('client.account.')->middleware('check-user')->controller(AccountController::class)->group(
    function () {
        Route::get('/','index')->name('index');
        Route::get('/my-course','myCourse')->name('myCourse');
        Route::get('all-my-course','filterMyCourse')->name('filterMyCourse');
        Route::get('/my-order','myOrder')->name('myOrder');
        Route::get('show/{orderDetail}','show')->name('show');
        Route::get('/detail','detail')->name('detail');
        Route::post('update/{id}','update')->name('update');
        Route::post('updatepass/{id}','updatepass')->name('updatepass');
    }
);
