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

    // public function getDemoAttribute()
    // {
    //     if ($this->is_demo == 1) {
    //         return "Công khai";
    //     } else {
    //         return "Không công khai";
    //     }
    // }
}
