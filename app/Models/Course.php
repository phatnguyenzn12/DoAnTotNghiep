<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends BaseModel
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
        'cate_course_id',
        'mentor_id',
        'skill_id',
        'language',
        'certificate',
        'tags',
        'type',
        'description',
        'description_details',
    ];

    protected $appends = [
        'current_price','active','language_rule'
    ];

    ////////////////////////////////////////////////////////////////

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
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
        return $this->belongsToMany(Order::class, OrderDetail::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
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

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    public function getCurrentPriceAttribute()
    {
        $price = $this->discount > 0
            ? $this->price - ($this->price * ($this->discount / 100))
            : $this->price;
        return $price;
    }

    public function getActiveAttribute()
    {
        $type = $this->type == 0
            ? 'Chờ xử lý'
            : 'Được sử dụng';
        return $type;
    }

    public function getLanguageRuleAttribute()
    {
        $language = $this->language == 0
            ? 'Tiếng việt'
            : 'english';
        return $language;
    }

}
