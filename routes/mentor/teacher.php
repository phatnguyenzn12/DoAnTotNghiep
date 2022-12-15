<?php

use App\Http\Controllers\Mentor\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/teacher')->name('mentor.teacher.')->middleware(['check-mentor','check-lead'])->controller(TeacherController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data/{search?}/{record?}','filterData')->name('listData');
        Route::match(['get', 'post'], 'create', 'create')->name('create');
        Route::get('/actived/{id}', 'actived')->name('actived');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('subtract/{id}', 'subtract')->name('subtract');
        Route::get('detail/{id}', 'detail')->name('detail');
        Route::put('update/{id}', 'update')->name('update');

    }
);
