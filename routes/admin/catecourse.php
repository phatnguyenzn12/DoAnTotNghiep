<?php

use App\Http\Controllers\Admin\CateCourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/cate-course')->name('admin.cate-course.')->middleware('role:admin')->controller(CateCourseController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('listdelete','listdelete')->name('listdelete');
        Route::get('create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::put('edit{id}','update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('delete');
    }
);
