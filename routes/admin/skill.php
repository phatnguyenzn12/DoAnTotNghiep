<?php

use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/skill')->name('admin.skill.')->middleware('role:admin')->controller(SkillController::class)->group(
     function () {
         Route::get('index', 'index')->name('index');
         Route::match(['get', 'post'],'create', 'create')->name('create');
         Route::match(['get','post'],'/update/{id}', 'update')->name('update');
         Route::delete('delete/{id}', 'destroy')->name('delete');
     }
 );