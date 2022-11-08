<?php

use App\Http\Controllers\Client\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('course')->name('client.course.')->controller(CourseController::class)->group(
    function () {
        Route::get('{slug}-{course}','show')->name('show')->where([
            'slug' => '.*',
            'course' => '\d+'
        ]);
    }
);
