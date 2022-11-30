<?php

use App\Http\Controllers\mentor\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/lesson')->name('mentor.lesson.')->middleware('role:mentor')->controller(LessonController::class)->group(
    function () {
        // Route::get('list/{id}', 'list')->name('list');
        // Route::get('create', 'create')->name('create');
        // Route::post('add', 'store')->name('add');
        // Route::put('put/{lesson}', 'update')->name('put');
        Route::get('create', 'create')->name('create');
        Route::get('index', 'index')->name('index');
        Route::get('list/{id}', 'list')->name('list');
        Route::get('/actived/{lesson_video}/{check}', 'actived')->name('actived');
        Route::get('/actived_id/{lesson_video}/{check}', 'actived_id')->name('actived_id');
        Route::get('show/{lesson}', 'show')->name('show');
        Route::delete('delete', 'destroy')->name('delete');
        Route::get('show-sort/{chapter}', 'showSort')->name('showSort');
        Route::put('sort', 'sort')->name('sort');
    }
);
