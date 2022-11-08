<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/course')->name('admin.course.')->middleware('role:admin|manager')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{id}', 'update')->name('update');
    }
);
