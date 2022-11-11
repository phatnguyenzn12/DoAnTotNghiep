<?php

use App\Http\Controllers\Admin\AuthAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->controller(AuthAdminController::class)->group(
    function () {
        Route::match(['get', 'post'], '/register', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::post('/handle-login', 'handleLogin')->name('handleLogin');
        Route::get('/actived/{id}/{token}', 'actived')->name('actived');
        Route::match(['get', 'post'], '/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::match(['get', 'post'],'/handleChangePassword/{id}/{token}', 'handleChangePassword')->name('handleChangePassword');
        Route::get('/logout', 'logout')->name('logout');
    }
);