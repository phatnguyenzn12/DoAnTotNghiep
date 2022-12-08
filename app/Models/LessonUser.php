<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    use HasFactory;

    protected $table = 'lesson_user';

    protected $fillable = [
        'lesson_id',
        'user_id',
        'course_id'
    ];
}
