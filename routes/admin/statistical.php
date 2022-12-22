<?php

use App\Http\Controllers\Admin\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin.statistical.')->name('admin.statistical.')->middleware('check-admin')->controller(StatisticalController::class)->group(
    function () {
        Route::get('home', 'home')->name('home');
        Route::get('course-list', 'course-course_list')->name('courseList');
        Route::get('course-selling-index','CourseSellingIndex')->name('CourseSelling');
        Route::get('teacher-list','teacherList')->name('teacherList');
    }
);

Route::prefix('api/admin/statistical')->name('api.admin.statistical.')->middleware('check-admin')->controller(StatisticalController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('turnover','turnover')->name('turnover');
    }
);

Route::prefix('api/admin/statistical')->name('api.admin.statistical.')->middleware('check-admin')->controller(StatisticalController::class)->group(
    function () {
        Route::get('teacher','apiTeacherList')->name('apiTeacherList');
        Route::get('turnover','apiTurnoverYear')->name('turnover');
        Route::get('api-course-selling-index','apiCourseSelling')->name('apiCourseSelling');
        Route::get('api-course-amount','apiAmount')->name('apiAmount');
    }
);
