<?php

use App\Http\Controllers\Admin\MentorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/mentor')->name('mentor.')->middleware('check-admin')->controller(MentorController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data/{search?}/{record?}','filterData')->name('listData');
        Route::get('listCourse/{id}', 'listCourse')->name('listCourse');
        Route::get('list-data-course/{search?}/{record?}','filterDataCourse')->name('listDataCourse');
        Route::get('apply', 'apply')->name('apply');
        Route::get('detail/{id}', 'detail')->name('detail');
        Route::put('update/{id}', 'update')->name('update');
        Route::match(['get', 'post'],'create','create')->name('create');
        Route::get('/actived/{id}', 'actived')->name('actived');
        Route::get('/accept/{id}', 'accept')->name('accept');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/deleteApply/{id}', 'deleteApply')->name('deleteApply');
        Route::get('/commentLesson/{id}', 'commentLesson')->name('commentLesson');
        Route::get('/hideComment/{id}/{cate_course_id}', 'hideComment')->name('hideComment');
    }
);
