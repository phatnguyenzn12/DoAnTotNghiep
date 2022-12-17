<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLesson extends BaseModel
{
    use HasFactory;
    protected $table = 'comment_lessons';
    protected $fillable = [
        'comment',
        'image',
        'reply',
        'status',
        'tags',
        'mentor_id',
        'lesson_id',
        'user_id',
    ];

    protected $appends = [
        'info', 'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(CommentLesson::class, 'reply');
    }

    public function reply_parent()
    {
        return $this->belongsTo(CommentLesson::class, 'reply');
    }


    public function getInfoAttribute()
    {
        if ($this->user) {
            return $this->user;
        }

        return $this->mentor;
    }

    public function getRoleAttribute()
    {
        if ($this->user) {
            return "Người dùng";
        }

        return '<span class="text-danger">Giảng viên</span>';
    }
}
