<?php

use App\Http\Controllers\admin\AuthAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/admins')->name('admins.')->middleware('check-admin')->controller(AuthAdminController::class)->group(
    function () {
        Route::get('/index','index')->name('index');
        Route::get('/list-data/{search?}/{record?}','filterData')->name('listData');
        Route::match(['get','post'],'/update/{id}', 'update')->name('update');
    }
);
    
Route::get('admin', function () {
    return view('screens.admin.home');
})->middleware('check-admin')->name('admin');
