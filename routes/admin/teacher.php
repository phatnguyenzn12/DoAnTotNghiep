<?php

use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/teacher')->name('teacher.')->middleware('check-admin')->controller(TeacherController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data/{search?}/{record?}','filterData')->name('listData');
        Route::get('apply', 'apply')->name('apply');
        Route::get('detail/{id}', 'detail')->name('detail');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('/actived/{id}', 'actived')->name('actived');
        Route::get('/accept/{id}', 'accept')->name('accept');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/deleteApply/{id}', 'deleteApply')->name('deleteApply');
      
    }
);
