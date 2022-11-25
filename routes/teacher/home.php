<?php

use App\Http\Controllers\Teacher\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->name('teacher.')->middleware('role:mentor')->controller(HomeController::class)->group(
    function () {
        Route::get('home', 'index')->name('home');
    }
);
