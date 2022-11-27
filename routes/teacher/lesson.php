<?php


use App\Http\Controllers\mentor\CourseController;
use App\Http\Controllers\Teacher\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/lesson')->name('teacher.lesson.')->middleware(['role:mentor','roles:teacher'])->controller(LessonController::class)->group(
    function () {
        Route::get('list/{id}', 'list')->name('list');
        Route::get('create', 'create')->name('create');
        Route::post('add', 'store')->name('add');
        Route::put('put/{lesson}', 'update')->name('put');
        Route::get('show/{lesson}', 'show')->name('show');
        Route::delete('delete', 'destroy')->name('delete');
        Route::get('edit-program/{mentor_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');
    }
);
