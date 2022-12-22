<?php

use App\Http\Controllers\Mentor\AccountController;
use App\Http\Controllers\Teacher\AccountController as TeacherAccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/account')->name('teacher.account.')->middleware(['check-mentor', 'check-teacher'])->controller(TeacherAccountController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('password', 'password')->name('password');
        Route::post('forgot-password/{id}', 'forgotPassword')->name('forgotPassword');

        Route::get('form-withdraw/{mentor_id}', 'formWithdraw')->name('formWithdraw');
        Route::post('withdraw/{mentor_id}','withdraw')->name('withdraw');
        Route::get('list-withdraw-money/{mentor_id}', 'listWithdraw')->name('listWithdraw');
        Route::get('list-data-withdraw-money', 'filterWithdraw')->name('filterWithdraw');

    }
);
