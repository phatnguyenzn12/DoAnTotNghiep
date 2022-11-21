<?php

use App\Http\Controllers\Censor\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('censor/course')->name('censor.course.')->middleware('role:censor')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('/actived/{course}/{status}', 'actived')->name('actived');
    }
);
