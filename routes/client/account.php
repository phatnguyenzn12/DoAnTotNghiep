<?php

use App\Http\Controllers\Client\AccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('account')->name('client.account.')->controller(AccountController::class)->group(
    function () {
        Route::get('/','index')->name('index');
        Route::get('/my-course','myCourse')->name('myCourse');
        Route::get('/detail','detail')->name('detail');
        Route::post('update/{id}','update')->name('update');
        Route::post('updatepass/{id}','updatepass')->name('updatepass');
    }
);
