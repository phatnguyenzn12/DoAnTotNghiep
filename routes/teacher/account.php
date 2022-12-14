<?php

use App\Http\Controllers\Mentor\AccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/account')->name('teacher.account.')->controller(AccountController::class)->group(
    function () {
        Route::get('salary-bonus','salaryBonus')->name('salaryBonus');
    }
);
