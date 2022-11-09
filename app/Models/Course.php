<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    ////////////////////////////////////////////////////////////////

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
        return $this->belongsToMany(User::class, OwnerCourse::class);
    }


    ///////////////////////////////////////////////////////////////////

    public function getCurrentPriceAttribute()
    {
        $price = $this->discount > 0
            ? $this->price - ($this->price * ($this->discount / 100))
            : $this->price;
        return $price;
    }

    ///////////////////////////////////////////////////////////////////

    function scopePrice($query, Request $request)
    {
        if ($request->price != 0 && $request->has('price')) {
            $query->where('price', '<', $request->price);
        }

        return $query;
    }

    function scopeTitle($query, Request $request)
    {
        if ($request->has('title') && $request->title != 0) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        return $query;
    }

    function scopeCateCourse($query, Request $request)
    {
        if ($request->has('cate') && $request->cate != 0) {
            $query->where('cate_course_id', $request->cate );
        }

        return $query;
    }

    function scopeOrderByPriceDESC($query, Request $request)
    {
        if ($request->has('current_price')) {
            $query = $query->orderBy($request->current_price, 'DESC');
        }
        return $query;
    }

    function scopeOrderByPriceASC($query, Request $request)
    {
        if ($request->has('current_price_sort')) {
            $query = $query->orderBy($request->current_price_sort, 'ASC');
        }
        return $query;
    }
}
