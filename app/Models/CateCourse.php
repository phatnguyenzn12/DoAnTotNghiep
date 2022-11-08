<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateCourse extends Model
{
    use HasFactory;

    protected $table = 'cate_courses';

    protected $fillable = [
        'name',
    ];

    public function courses() {
        return $this->hasMany(Course::class,'cate_course_id','id');
    }
}
