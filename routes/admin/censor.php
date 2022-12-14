<?php

use App\Http\Controllers\Censor\CensorController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/censor')->name('admin.censor.')->middleware('check-admin')->controller(CensorController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::match(['get', 'post'],'create','create')->name('create');
        Route::get('/actived/{id}', 'actived')->name('actived');
        Route::get('/delete/{id}', 'delete')->name('delete');
    }
);
