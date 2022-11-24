<?php

use App\Http\Controllers\Admin\MentorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/mentor')->name('mentor.')->middleware('role:admin')->controller(MentorController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::match(['get', 'post'],'create','create')->name('create');
        Route::get('/actived/{id}', 'actived')->name('actived');
        Route::get('/accept/{id}', 'accept')->name('accept');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/commentLesson/{id}', 'commentLesson')->name('commentLesson');
        Route::get('/hideComment/{id}/{cate_course_id}', 'hideComment')->name('hideComment');
    }
);
