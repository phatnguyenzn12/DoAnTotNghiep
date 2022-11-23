<?php

use App\Http\Controllers\Admin\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/statistical')->name('admin.statistical.')->middleware('role:admin')->controller(StatisticalController::class)->group(
    function () {
        Route::get('index','index')->name('index');
        Route::get('turnover','turnover')->name('turnover');
    }
);
