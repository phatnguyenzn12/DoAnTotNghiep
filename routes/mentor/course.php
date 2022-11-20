<?php

use App\Http\Controllers\mentor\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/course')->name('mentor.course.')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{id}', 'update')->name('update');
    }
);
