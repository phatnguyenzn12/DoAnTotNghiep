<?php

use App\Http\Controllers\mentor\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/lesson')->name('mentor.lesson.')->middleware(['check-mentor','check-lead'])->controller(LessonController::class)->group(
    function () {
        Route::get('create', 'create')->name('create');
        Route::get('index', 'index')->name('index');
        Route::get('list-data-chapter/{search?}/{record?}','filterDataLesson')->name('listDataLesson');
        Route::get('create', 'create')->name('create');
        Route::post('add', 'store')->name('add');

        Route::get('show/{lesson}', 'show')->name('show');
        Route::delete('delete/{lesson}','destroy')->name('delete');
        Route::get('show-sort/{chapter}', 'showSort')->name('showSort');
        Route::put('sort', 'sort')->name('sort');
        Route::put('put/{lesson}', 'update')->name('put');
    }
);
