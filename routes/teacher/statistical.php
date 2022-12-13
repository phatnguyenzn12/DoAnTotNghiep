<?php

use App\Http\Controllers\Teacher\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/statistical')->name('teacher.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','listStudent')->name('listStudent');
        Route::get('index','index')->name('index');
    }
);

Route::prefix('api/teacher/statistical')->name('api.teacher.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','apiListStudent')->name('listStudent');
        Route::get('turnover','apiTurnoverYear')->name('turnover');
        Route::get('api-course-sellingTop','apiCourseSellingTop')->name('apiCourseSellingTop');
    }
);
