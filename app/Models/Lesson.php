<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'lesson_type',
        'attachment',
        'sort',
        'chapter_id'
    ];

    public function lessonVideo() {
        return $this->hasOne(LessonVideo::class,'lesson_id','id');
    }

    public function commentLessons(){
        return $this->hasMany(CommentLesson::class,'lesson_id','id');
    }
}
