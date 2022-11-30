<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'lesson_type',
        'attachment',
        'time',
        'sort',
        'chapter_id',
        'download_progress',
        'is_demo',
        'is_check'
    ];

    protected $appends = [
        'time_edited'
    ];

    public function lessonVideo()
    {
        return $this->hasOne(LessonVideo::class, 'lesson_id', 'id');
    }

    public function lesson_user()
    {
        return $this->belongsToMany(User::class, LessonUser::class);
    }

    public function commentLessons()
    {
        return $this->hasMany(CommentLesson::class, 'lesson_id', 'id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function getDemoAttribute()
    {
        if ($this->is_demo == 1) {
            return "Công khai";
        } else {
            return "Không công khai";
        }
    }

}
