<?php

use App\Http\Controllers\Censor\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('censor/lesson')->name('censor.lesson.')->middleware('role:censor')->controller(LessonController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('/actived/{lesson_video}/{check}', 'actived')->name('actived');
    }
);
