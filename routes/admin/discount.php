<?php
use App\Http\Controllers\Admin\DiscountCodeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/discount')->name('admin.discount.')->middleware('check-admin')->controller(DiscountCodeController::class)->group(
     function () {
         Route::get('index', 'index')->name('index');
         Route::get('create', 'create')->name('create');
         Route::post('store', 'store')->name('store');
         Route::get('edit-discount/{id}', 'edit')->name('edit');
         Route::post('update-discount/{id}', 'update')->name('update');
         Route::get('delete/{id}', 'destroy')->name('delete');
     }
 );
