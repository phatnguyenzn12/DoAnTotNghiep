<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;

// Route::controller(BannerController::class)->group(
//     function () {
//         Route::resource('admin/banner');
//     }
// );
Route::prefix('admin/banner')->name('admin.banner.')->middleware('check-admin')->controller(BannerController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data/{search?}/{record?}', 'filterData')->name('listData');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit-banner/{id}', 'edit')->name('edit');
        Route::post('update-banner/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('delete');
    }
);
