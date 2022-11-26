<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';
    protected $fillable = [
        'id',
        'number_chapter',
        'mentor_id',
        'title',
        'course_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }
}
