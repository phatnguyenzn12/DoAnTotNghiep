<?php

use App\Http\Controllers\Client\CertificateController;
use App\Http\Controllers\Client\CommentLessonController;
use App\Http\Controllers\Client\LessonController;
use App\Http\Controllers\Client\MentorLessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('lesson')->name('client.lesson.')->middleware(['check-auth-lesson'])->controller(LessonController::class)->group(
    function () {
        Route::get('exercise/{course}', 'index')->name('index');
        Route::get('exercise-lesson/{course}/{lesson}', 'show')->name('show');
        Route::get('comment-details/{comment_lesson}', 'commentDetails')->name('commentdetails');
        Route::post('comment-parent-add/{lesson}/{course}', 'parentComment')->name('parentComment');
        Route::post('course/{course_id}/comment-child-add/{comment_parent}', 'childComment')->name('childComment');

        Route::get('list-comment','filterComment')->name('filterComment');
        Route::get('delete/{commentLesson}', 'removeComment')->name('removeComment');
    }
);

// Route::prefix('mentor-lesson')->name('client.mentorLesson.')->middleware(['check-mentor'])->controller(MentorLessonController::class)->group(
//     function () {
//         Route::get('exercise/{course}', 'index')->name('index');
//         Route::get('exercise-lesson/{course}/{lesson}', 'show')->name('show');
//         Route::get('comment-details/{comment_lesson}', 'commentDetails')->name('commentdetails');
//         Route::post('comment-parent-add/{lesson}', 'parentComment')->name('parentComment');
//         Route::post('course/{course_id}/comment-child-add/{comment_parent}', 'childComment')->name('childComment');
//     }
// );

Route::prefix('lesson')->name('client.certificate.')->middleware(['check-user'])->controller(CertificateController::class)->group(
    function () {
        Route::post('course/{course}/get-certificate', 'getCertificate')->middleware(['check-lesson-user'])->name('getCertificate');
        Route::get('course/{certificate}/certificate', 'index')->name('index');
        Route::get('exportpdf', 'exportpdf')->name('exportpdf');

    }
);

// Route::prefix('chapter')->name('client.chapter.')->controller(LessonController::class)->group(
//     function () {
//         Route::get('mentor/{mentor}/get-chapter/{chapter}', 'getChapter')->name('getChapter');
//         Route::post('review/{chapter}', 'postReview')->name('postReview');
//         Route::get('get-edit-comment-chapter/{chapterReview}', 'getEditReview')->name('getEditReview');
//         Route::put('edit-comment-chapter/{review}', 'editReview')->name('editReview');
//     }
// );
