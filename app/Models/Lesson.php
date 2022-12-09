<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'lesson_type',
        'time',
        'sort',
        'chapter_id',
        'is_demo',
        'is_check',
        'is_edit'
    ];

    protected $appends = [
        'time_edited', 'demo', 'active'
    ];

    public function lessonVideo()
    {
        return $this->hasOne(LessonVideo::class, 'lesson_id', 'id');
    }

    public function lesson_user()
    {
        return $this->belongsToMany(User::class, LessonUser::class);
    }

    public function check_lesson_user()
    {
        return $this->lesson_user();
    }

    public function commentLessons()
    {
        return $this->hasMany(CommentLesson::class, 'lesson_id', 'id');
    }

    public function commentLessonUser()
    {
        return $this->belongsToMany(User::class,CommentLesson::class);
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

    public function getActiveAttribute()
    {
        if ($this->is_check == 1) {
            return "Đã được duyệt";
        } elseif ($this->is_check == 2) {
            return "Cần sửa lại";
        } else {
            return "Video chưa được duyệt";
        }
    }
    public function getEditAttribute()
    {
        if ($this->is_check == 1) {
            return "Đã được duyệt";
        } elseif ($this->is_check == 2) {
            return "Cần sửa lại";
        } else {
            return "Video chưa được duyệt";
        }
    }
}
