<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(
    function () {
        Route::get('/','index')->name('client');
    }
);

Route::middleware(['role:admin|manager|teacher'])->group(
    function () {
        Route::get('admin', function () {
            return view('screens.admin.home');
        })->name('admin');
    }
);

Route::prefix('/')->name('auth.')->controller(AuthController::class)->group(
    function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/forgot-password','forgotPassword')->name('forgotPassword');
        Route::get('/change-password','changePassword')->name('changePassword');
        Route::post('/handle-login', 'handleLogin')->name('handleLogin');
        Route::post('/handle-register', 'handleRegister')->name('handleRegister');
        Route::post('/handle-change-password','handleChangePassword')->name('handleChangePassword');
    }
);

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(
    function () {
        Route::get('google', 'redirectToGoogle')->name('google');
        Route::get('google/callback','googleLogin')->name('googlelogin');
    }
);


