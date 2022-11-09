<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;

// Route::controller(BannerController::class)->group(
//     function () {
//         Route::resource('admin/banner');
//     }
// );
Route::prefix('admin/banner')->name('admin.banner.')->middleware('auth','permission.check:admin|mentor')->controller(BannerController::class)->group(
     function () {
         Route::get('index', 'index')->name('index');
         Route::get('create', 'create')->name('create');
         Route::post('store', 'store')->name('store');
         Route::get('edit-banner/{id}', 'edit')->name('edit');
         Route::put('update-banner/{id}', 'update')->name('update');
     }
 );