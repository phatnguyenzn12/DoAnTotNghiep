<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

// Route::prefix('admin/course')->name('course.')->middleware('role:admin')->controller(CourseController::class)->group(
//     function () {
//         Route::get('index', 'index')->name('index');

Route::prefix('admin/course')->name('admin.course.')->middleware('check-admin')->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data', 'filterData')->name('listData');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('list-data-chapter', 'filterDataChapter')->name('listDataChapter');
        Route::get('create/{id}', 'create')->name('create');
        Route::post('store/{id}', 'store')->name('store');
        Route::put('/actived/{course}', 'actived')->name('actived');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');

        Route::get('detail/{lesson}', 'detailLesson')->name('detailLesson');

        Route::get('form-edit-lesson/{lesson}', 'formEditLesson')->name('formEditLesson');
        Route::get('active-isdemo/{lesson}', 'activeIsDemo')->name('activeIsDemo');
        Route::get('deactive-isdemo/{lesson}', 'deactiveIsDemo')->name('deactiveIsDemo');

        Route::get('form-deactive-course/{id}', 'formDeactiveCourse')->name('formDeactiveCourse');
        Route::put('deactive-course/{course}', 'deactiveCourse')->name('deactiveCourse');
    }
);
