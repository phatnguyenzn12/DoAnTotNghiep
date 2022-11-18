<?php

use App\Http\Controllers\Censor\AuthCensorController;
use App\Http\Controllers\Censor\CensorController;
use Illuminate\Support\Facades\Route;

Route::prefix('censor')->name('censor.')->controller(AuthCensorController::class)->group(
    function () {
        Route::get('', function () {
            return view('screens.censor.home');
        })->name('index');
        Route::get('/login', 'login')->name('login');
        Route::post('/handle-login', 'handleLogin')->name('handleLogin');
        Route::get('/logout', 'logout')->name('logout');
    }
);
Route::prefix('censor')->name('censor.')->controller(CensorController::class)->group(
    function () {
        Route::match(['get','post'],'/edit', 'edit')->name('edit');
    }
);