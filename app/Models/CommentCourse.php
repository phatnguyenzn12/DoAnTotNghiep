<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentCourse extends BaseModel
{
    use HasFactory;
    protected $table = 'comment_courses';
    protected $fillable = [
        'comment',
        'vote',
        'user_id',
        'reply',
        'status',
        // 'id_mentor',
        'course_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function course() {
        return $this->belongsTo(Course::class,'user_id','id');
    }
}
