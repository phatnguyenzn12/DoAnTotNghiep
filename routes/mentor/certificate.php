<?php

use App\Http\Controllers\Mentor\CertificateController;
use Illuminate\Support\Facades\Route;


Route::prefix('mentor/certificate')->name('mentor.certificate.')->middleware(['check-mentor','check-lead'])->controller(CertificateController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('list-data/{search?}/{record?}','filterData')->name('listData');
        Route::get('edit/{certificate}','edit')->name('edit');
        Route::get('create','create')->name('create');
        Route::put('update/{certificate}','update')->name('update');
        Route::post('store','store')->name('store');
        Route::delete('destroy/{certificate}','destroy')->name('destroy');
    }
);
