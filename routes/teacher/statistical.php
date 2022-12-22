<?php

use App\Http\Controllers\Teacher\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/statistical')->name('teacher.statistical.')->middleware(['check-mentor','check-teacher'])->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','listStudent')->name('listStudent');
        Route::get('student-detail/{user}','studentDetail')->name('studentDetail');
        Route::get('salary-bonus', 'salaryBonus')->name('salaryBonus');
        Route::get('salary-bonus-detail/{course}', 'salaryBonusDetail')->name('salaryBonusDetail');
    }
);

Route::prefix('api/teacher/statistical')->name('api.teacher.statistical.')->middleware(['check-mentor','check-teacher'])->controller(StatisticalController::class)->group(
    function () {
        Route::get('student','apiListStudent')->name('listStudent');
        Route::get('student-detail','apiStudentDetail')->name('apiStudentDetail');
        Route::get('api-course-sellingTop','apiCourseSellingTop')->name('apiCourseSellingTop');
        Route::get('api-course-detail-sellingTop','apiSalaryBonusDetail')->name('apiSalaryBonusDetail');
    }
);

