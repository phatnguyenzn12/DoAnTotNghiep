<?php

use App\Http\Controllers\Mentor\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->name('teacher.')->middleware(['check-mentor','check-teacher'])->controller(HomeController::class)->group(
    function () {
        Route::get('home', 'index')->name('home');
       Route::get('course-list', 'course-course_list')->name('course_list');
    }
);
