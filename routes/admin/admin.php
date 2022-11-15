<?php

use App\Http\Controllers\admin\AuthAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/admins')->name('admins.')->middleware('role:admin|mentor')->controller(AuthAdminController::class)->group(
    function () {
        Route::get('/index','index')->name('index');
        Route::get('/list-data/{search?}/{record?}','filterData')->name('listData');
        Route::match(['get','post'],'/update/{id}', 'update')->name('update');
    }
);
