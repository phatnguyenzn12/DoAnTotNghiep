<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteCourse extends Model
{
    use HasFactory;
    protected $table = 'vote_courses';
    protected $fillable = [
        'comment',
        'rating',
        'user_id',
        'course_id',
    ];
}
