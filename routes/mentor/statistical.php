<?php

use App\Http\Controllers\Mentor\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/statistical')->name('mentor.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','listStudent')->name('listStudent');
        Route::get('index','index')->name('index');
    }
);
Route::prefix('api/mentor/statistical')->name('api.mentor.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','apiListStudent')->name('listStudent');
        Route::get('turnover','apiTurnoverYear')->name('turnover');
        Route::get('api-course-sellingTop','apiCourseSellingTop')->name('apiCourseSellingTop');
    }
);
