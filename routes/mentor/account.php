<?php

use App\Http\Controllers\Mentor\AccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/account')->name('mentor.account.')->controller(AccountController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('forgot-password','forgotPassword')->name('forgotPassword');
        Route::get('student','listStudent')->name('listStudent');
        Route::get('comment','commentMentor')->name('commentMentor');
    }
);
