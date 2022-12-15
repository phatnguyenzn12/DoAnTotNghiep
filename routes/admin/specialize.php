<?php

use App\Http\Controllers\Admin\SpecializeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/specialize')->name('admin.specialize.')->middleware('check-admin')->controller(SpecializeController::class)->group(
     function () {
         Route::get('index', 'index')->name('index');
         Route::match(['get', 'post'],'create', 'create')->name('create');
         Route::match(['get','post'],'/update/{id}', 'update')->name('update');
         Route::delete('delete/{id}', 'destroy')->name('delete');
     }
 );