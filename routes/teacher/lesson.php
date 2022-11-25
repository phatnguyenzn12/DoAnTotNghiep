<?php


use App\Http\Controllers\mentor\CourseController;
use App\Http\Controllers\Teacher\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/lesson')->name('teacher.lesson.')->controller(LessonController::class)->group(
    function () {
        Route::get('', 'index')->name('index');
        Route::get('add/{chapter}', 'create')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');
    }
);
