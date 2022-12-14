<?php

use App\Http\Controllers\Teacher\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/course')->name('teacher.course.')->middleware(['check-mentor','check-teacher'])->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data','filterData')->name('listData');
    }
);
