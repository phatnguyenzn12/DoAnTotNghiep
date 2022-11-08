<?php

use App\Http\Controllers\Admin\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/lesson')->name('admin.lesson.')->middleware('role:admin|manager')->controller(LessonController::class)->group(
    function () {
        Route::get('create', 'create')->name('create');
        Route::post('add', 'store')->name('add');
        Route::put('put/{lesson}', 'update')->name('put');
        Route::get('show/{lesson}', 'show')->name('show');
        Route::delete('delete', 'destroy')->name('delete');
        Route::get('show-sort/{chapter}', 'showSort')->name('showSort');
        Route::put('sort', 'sort')->name('sort');
    }
);
