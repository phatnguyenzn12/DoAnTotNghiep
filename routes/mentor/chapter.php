<?php

use App\Http\Controllers\mentor\ChapterController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/chapter')->name('mentor.chapter.')->middleware(['check-mentor','check-lead'])->controller(ChapterController::class)->group(
    function () {
        Route::get('create','create')->name('create');
        Route::post('add','store')->name('add');
        Route::put('put/{chapter}','update')->name('put');
        Route::get('show/{chapter}','show')->name('show');
        Route::delete('delete/{chapter}','destroy')->name('delete');
        Route::get('show-sort/{course}', 'showSort')->name('showSort');
        Route::put('sort', 'sort')->name('sort');

    }
);
