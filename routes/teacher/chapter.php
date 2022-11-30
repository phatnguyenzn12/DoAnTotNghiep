<?php


use App\Http\Controllers\Teacher\ChapterController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/chapter')->name('teacher.chapter.')->middleware(['role:mentor','roles:teacher'])->controller(ChapterController::class)->group(
    function () {
        Route::get('', 'index')->name('index');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('show/{chapter}','show')->name('show');
    }
);
