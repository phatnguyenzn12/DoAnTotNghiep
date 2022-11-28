<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/course')->name('course.')->middleware('role:admin')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
    }
);
