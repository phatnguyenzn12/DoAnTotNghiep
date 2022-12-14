<?php

use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/skill')->name('admin.skill.')->middleware('check-admin')->controller(SkillController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('list-data/{search?}/{record?}', 'filterData')->name('listData');
        Route::match(['get', 'post'], 'create', 'create')->name('create');
        Route::match(['get', 'post'], '/update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('delete');
    }
);
