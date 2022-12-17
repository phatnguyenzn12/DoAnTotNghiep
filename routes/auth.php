<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->middleware('check-client')->group(
    function () {
        Route::get('/','index')->name('client');
    }
);

Route::prefix('/')->name('auth.')->controller(AuthController::class)->group(
    function () {
        Route::match(['get', 'post'], '/register', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::post('/handle-login', 'handleLogin')->name('handleLogin');
        Route::get('/actived/{id}/{token}', 'actived')->name('actived');
        Route::get('/logout', 'logout')->name('logout');
        Route::match(['get', 'post'], '/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::match(['get', 'post'],'/handleChangePassword/{id}/{token}', 'handleChangePassword')->name('handleChangePassword');
    }
);

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(
    function () {
        Route::get('google', 'redirectToGoogle')->name('google');
        Route::get('google/callback','googleLogin')->name('googlelogin');
    }
);


