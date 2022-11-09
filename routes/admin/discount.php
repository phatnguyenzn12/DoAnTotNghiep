<?php

use App\Http\Controllers\Admin\DiscountCodeController;
use Illuminate\Support\Facades\Route;

// Route::controller(DiscountCodeController::class)->group(
//     function () {
//         Route::resource('admin/discount');
//     }
// );
Route::prefix('admin/discount')->name('admin.discount.')->middleware('auth','permission.check:admin|mentor')->controller(DiscountCodeController::class)->group(
     function () {
         Route::get('index', 'index')->name('index');
         Route::get('create', 'create')->name('create');
         Route::post('store', 'store')->name('store');
         Route::get('edit-discount/{id}', 'edit')->name('edit');
         Route::put('update-discount/{id}', 'update')->name('update');
     }
 );