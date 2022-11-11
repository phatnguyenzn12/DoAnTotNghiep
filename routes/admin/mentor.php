<?php

use App\Http\Controllers\Admin\MentorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/mentor')->name('mentor.')->controller(MentorController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::match(['get', 'post'],'create','create')->name('create');
        Route::get('/actived/{id}', 'actived')->name('actived');
    }
);
