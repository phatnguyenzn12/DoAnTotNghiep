<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Lesson extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'lesson_type',
        // 'time_check',
        'sort',
        'chapter_id',
        'is_demo',
        // 'is_check',
        'is_edit'
    ];

    protected $appends = [
        'demo',
        'edit',
        'edit_exit'
        // 'active'
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
        return $this->belongsToMany(User::class, CommentLesson::class);
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

    public function getEditExitAttribute()
    {
        if ($this->is_edit == 0) {
            return "Chưa có video";
        } elseif ($this->is_edit == 2) {
            return "Video chưa tải xong";
        } else {
            return "Đã có video";
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
