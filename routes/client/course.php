<?php

use App\Http\Controllers\Client\CommentCourseController;
use App\Http\Controllers\Client\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('course')->name('client.course.')->controller(CourseController::class)->group(
    function () {
        Route::get('{slug}-{course}', 'show')->name('show')->where([
            'slug' => '.*',
            'course' => '\d+'
        ]);

        Route::get('list', 'index')->name('list');

        Route::get('all-course','filterCourse')->name('filterCourse');
    }
);
Route::name('commentcourse.')->controller(CommentCourseController::class)->group(
    function () {
        Route::post('store',  'store')->name('store');


    }
);
