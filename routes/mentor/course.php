<?php


use App\Http\Controllers\mentor\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('mentor/course')->name('mentor.course.')->middleware(['check-mentor','check-lead'])->controller(CourseController::class)->group(
    function () {
        Route::get('index', 'index')->name('index');
        Route::get('comment-course', 'commentCourse')->name('commentCourse');
        Route::put('active-activecomment/{comment}', 'activecomment')->name('activecomment');
        Route::put('deactive-activecomment/{comment}', 'deactivecomment')->name('deactivecomment');
        Route::get('list-comment','filterComment')->name('listComment');
        Route::get('delete/{id}', 'deleteComment')->name('deleteComment');

        Route::get('list-data','filterData')->name('listData');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit-program/{course_id}', 'program')->name('program');
        Route::get('list-data-chapter','filterDataChapter')->name('listDataChapter');
        Route::get('edit-course/{id}', 'edit')->name('edit');
        Route::put('update-course/{course}', 'update')->name('update');
        Route::put('update-actived/{course}', 'actived')->name('actived');

        Route::post('course-teacher/{course}', 'courseTeach')->name('courseTeach');

        Route::get('form-deactive-course/{id}', 'formDeactiveCourse')->name('formDeactiveCourse');
        Route::put('deactive-course/{course}', 'deactiveCourse')->name('deactiveCourse');
    }
);
