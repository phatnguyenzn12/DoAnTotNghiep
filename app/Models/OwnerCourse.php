<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerCourse extends Model
{
    use HasFactory;
    protected $table = 'owner_course';
    protected $fillable = [
        'course_id',
        'user_id'
    ];
}
