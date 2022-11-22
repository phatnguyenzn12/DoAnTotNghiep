<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLesson extends Model
{
    use HasFactory;
    protected $table = 'comment_lessons';
    protected $fillable = [
        'comment',
        // 'vote',
        'reply',
        'status',
        // 'mentor_id',
        'lesson_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }
    // public function mentor(){
    //     return $this->belongsTo(Mentor::class,'mentor_id','id');
    // }
}
