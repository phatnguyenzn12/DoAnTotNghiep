<?php


use App\Http\Controllers\Teacher\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/lesson')->name('teacher.lesson.')->middleware(['role:mentor','roles:teacher'])->controller(LessonController::class)->group(
    function () {
        Route::get('list/{id}', 'list')->name('list');
        Route::put('put/{lesson}', 'update')->name('put');
        Route::get('show/{lesson}', 'show')->name('show');
        Route::get('detail/{lesson}', 'detail')->name('detail');
        Route::delete('delete', 'destroy')->name('delete');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');
    }
);
