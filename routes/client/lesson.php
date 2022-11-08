<?php

use App\Http\Controllers\Client\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('lesson')->name('client.lesson.')->controller(LessonController::class)->group(
    function () {
        Route::get('exercise/{course}','index')->name('index');
        Route::get('exercise-lesson/{lesson}','show')->name('show');
    }
);
