<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonVideo extends Model
{
    use HasFactory;
    protected $table = 'lesson_videos';
    protected $fillable = [
        'video_path',
       'lesson_id',
    ];

    protected $append = [
        'active'
    ];

   
}
