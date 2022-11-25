<?php

use App\Http\Controllers\Mentor\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/teacher')->name('mentor.teacher.')->middleware('role:mentor')->controller(TeacherController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::match(['get', 'post'],'create','create')->name('create');
    }
);