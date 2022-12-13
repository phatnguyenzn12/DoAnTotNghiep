<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CateCourse extends BaseModel
{
    use HasFactory;

    protected $table = 'cate_courses';

    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'cate_course_id', 'id');
    }

    public function mentors()
    {
        return $this->hasMany(Mentor::class, 'cate_course_id');
    }

    public function leader()
    {
        return Mentor::role('lead')->where('cate_course_id', $this->id)->first();
    }

    public function teachers()
    {
        return Mentor::role('teacher')->where('cate_course_id', $this->id)->get();
    }
}
