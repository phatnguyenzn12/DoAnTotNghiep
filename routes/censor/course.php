<?php

use App\Http\Controllers\Censor\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('censor/course')->name('censor.course.')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('/actived/{id}', 'actived')->name('actived');
    }
);
