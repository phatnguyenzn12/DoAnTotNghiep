<?php

use App\Http\Controllers\Admin\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin.statistical.')->name('admin.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('home', 'home')->name('home');
        Route::get('course-list', 'course-course_list')->name('courseList');
        Route::get('course-selling-index','CourseSellingIndex')->name('CourseSelling');
    }
);

Route::prefix('api/admin/statistical')->name('api.admin.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('turnover','turnover')->name('turnover');
    }
);

Route::prefix('api/admin/statistical')->name('api.admin.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','apiListStudent')->name('listStudent');
        Route::get('turnover','apiTurnoverYear')->name('turnover');
        Route::get('api-course-selling-index','apiCourseSelling')->name('apiCourseSelling');
    }
);
