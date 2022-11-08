<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'video',
        'image',
        'price',
        'discount',
        'status',
        'slug',
        'participant',
        'cate_course_id'
    ];

    protected $appends = [
        'current_price'
    ];

    public function getCurrentPriceAttribute()
    {
        $price = $this->discount > 0
            ? $this->price - ($this->price * ($this->discount / 100))
            : $this->price;
        return $price;
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'course_id', 'id');
    }

    public function commentCourses()
    {
        return $this->hasMany(CommentCourse::class, 'course_id', 'id');
    }

    public function voteCourses()
    {
        return $this->hasMany(VoteCourse::class, 'course_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, OrderDetail::class, 'order_id');
    }

    public function cateCourse()
    {
        return $this->belongsTo(CateCourse::class, 'cate_course_id')->select(['id', 'name']);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Chapter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,OwnerCourse::class);
    }
}
