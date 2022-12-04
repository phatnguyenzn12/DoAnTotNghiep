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
        'active', 'video',
    ];
    
    public function getVideoAttribute()
    {
       // $vdeo = DB::table('LessonVideo')->get();
        if ($this->video_path == 0) {
            return "Video chưa upload";
        } else {
            return "Video upload";
        }
    }

}
