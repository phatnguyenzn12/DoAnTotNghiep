<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

// Route::prefix('admin/course')->name('course.')->middleware('role:admin')->controller(CourseController::class)->group(
//     function () {
//         Route::get('index', 'index')->name('index');

Route::prefix('admin/course')->name('admin.course.')->middleware('role:admin')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('create/{id}', 'create')->name('create');
        Route::post('store/{id}', 'store')->name('store');
        Route::get('/actived/{course}/{status}', 'actived')->name('actived');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');

        Route::get('detail/{lesson}', 'detailLesson')->name('detailLesson');
    }
);
