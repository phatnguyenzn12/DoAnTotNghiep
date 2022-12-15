<?php


use App\Http\Controllers\Teacher\ChapterController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher/chapter')->name('teacher.chapter.')
    ->middleware(['check-mentor', 'check-teacher'])
    ->controller(ChapterController::class)->group(
        function () {
            // Route::get('', 'index')->name('index');
            Route::get('edit-program/{course_id}', 'program')->name('program');
            Route::get('list-data-chapter', 'filterDataChapter')->name('listDataChapter');
            Route::get('show/{chapter}', 'show')->name('show');
            Route::post('send-process/{course}', 'sendProcess')->name('sendProcess');
        }
    );
