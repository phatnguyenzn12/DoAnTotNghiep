<?php


use App\Http\Controllers\mentor\CourseController;
use App\Http\Controllers\Teacher\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/lesson')->name('teacher.lesson.')->middleware(['role:mentor','roles:teacher'])->controller(LessonController::class)->group(
    function () {
        Route::get('list/{id}', 'list')->name('list');
        Route::get('add/{chapter_id}', 'create')->name('add');
     //   Route::get('add', 'create')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');
    }
);
