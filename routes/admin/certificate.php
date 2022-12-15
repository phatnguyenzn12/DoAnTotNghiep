<?php

use App\Http\Controllers\Admin\CertificateController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/certificate')->name('admin.certificate.')->middleware('check-admin')->controller(CertificateController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::delete('delete/{id}', 'destroy')->name('delete');
        
    }
);
