<?php

use App\Http\Controllers\Client\CommentLessonController;
use App\Http\Controllers\Client\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('lesson')->name('client.lesson.')->controller(LessonController::class)->group(
    function () {
        Route::get('exercise/{course}', 'index')->name('index');
        Route::get('exercise-lesson/{course}/{lesson}', 'show')->middleware('check-lesson-user')->name('show');
        Route::get('video-complete/{course}/{lesson}', 'completeVideo')->name('complete');
    }
);

Route::prefix('lesson')->name('client.lesson.')->controller(CommentLessonController::class)->group(
    function () {
        Route::post('storecmt',  'store')->name('storecmt');
        Route::post('reply/{id_comment}', 'reply')->name('reply');
    }
);
