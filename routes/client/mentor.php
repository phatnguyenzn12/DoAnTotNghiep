<?php

use App\Http\Controllers\Client\MentorController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor')->name('client.mentor.')->middleware('check-client')->controller(MentorController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('/list-data','filterData')->name('listData');
        Route::get('list','list')->name('list');
        Route::post('apply','apply')->name('apply');
        Route::get('show/{mentor}','show')->name('show');
    }
);
