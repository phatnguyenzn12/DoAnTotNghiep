<?php

use App\Http\Controllers\Admin\CateCourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/cate-course')->name('admin.cate-course.')->middleware('check-admin')->controller(CateCourseController::class)->group(
    function () {
        Route::get('/index','index')->name('index');
        Route::get('/list-data','filterData')->name('listData');
        Route::get('listdelete','listdelete')->name('listdelete');
        Route::get('create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit{id}','update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('delete');
    }
);
