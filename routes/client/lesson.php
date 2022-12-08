<?php

use App\Http\Controllers\Client\CertificateController;
use App\Http\Controllers\Client\CommentLessonController;
use App\Http\Controllers\Client\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('lesson')->name('client.lesson.')->controller(LessonController::class)->group(
    function () {
        Route::get('exercise/{course}', 'index')->name('index');
        Route::get('exercise-lesson/{course}/{lesson}', 'show')->name('show');
        Route::get('comment-details/{comment_lesson}', 'commentDetails')->name('commentdetails');
        Route::post('comment-parent-add/{lesson}', 'parentComment')->name('parentComment');
        Route::post('course/{course_id}/comment-child-add/{comment_parent}', 'childComment')->name('childComment');

    }
);


Route::prefix('lesson')->name('client.certificate.')->controller(CertificateController::class)->group(
    function () {
        Route::post('course/{course}/getCertificate', 'getCertificate')->name('getCertificate');
        Route::get('course/{certificate}/certificate', 'index')->name('index');
    }
);


