<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends BaseModel
{
    use HasFactory;
    protected $table = 'chapters';
    protected $fillable = [
        'id',
        'sort',
        'title',
        'number',
        'course_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapterReview()
    {
        return $this->hasOne(ChapterReview::class);
    }

    // public function checkChapterReview()
    // {
    //     if ($this->chapterReview()->count() == 0) {
    //         return null;
    //     } else {
    //         return $this->chapterReview()->where('user_id', auth()->user()->id)->first();
    //     }
    // }

    // public function userLessonsComplete()
    // {
    //     if (!auth()->user()->courses->contains($this->id)) return null;
    //     $lessonComplete = $this->lessons()->select('id')->get()->pluck('id');
    //     $lessonComplete = LessonUser::whereIn('lesson_id',$lessonComplete)->where('user_id',auth()->user()->id)->get();
    //     return $lessonComplete;
    // }
}
