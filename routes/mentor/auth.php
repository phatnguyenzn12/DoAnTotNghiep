<?php

use App\Http\Controllers\Mentor\AuthMentorController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor')->name('mentor.')->controller(AuthMentorController::class)->group(
    function () {
        Route::match(['get', 'post'], '/register', 'register')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::post('/handle-login', 'handleLogin')->name('handleLogin');
        Route::get('/logout', 'logout')->name('logout');
    }
);