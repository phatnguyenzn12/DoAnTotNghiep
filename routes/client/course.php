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

        Route::get('list-course', 'index1')->name('list1');

        Route::get('/list-data','filterData')->name('listData');

        Route::get('/list-data1','filterData1')->name('listData1');

        Route::get('all-course','filterCourse')->name('filterCourse')
        ;
        Route::get('list-comment','filterComment')->name('filterComment');

        Route::get('lesson/lesson_video/{lesson_video}', 'demo')->name('lesson');

        Route::get('certificate/{course}', 'demo')->middleware('check-user')->name('generatePDF');
    }
);

Route::name('commentcourse.')->middleware('check-user')->controller(CommentCourseController::class)->group(
    function () {
        Route::post('store',  'store')->name('store');
    }
);
