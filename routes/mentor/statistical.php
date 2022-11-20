<?php

use App\Http\Controllers\Mentor\StatisticalController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/statistical')->name('mentor.statistical.')->controller(StatisticalController::class)->group(
    function () {
        Route::get('index','index')->name('index');
    }
);
