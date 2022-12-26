<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

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
        // 'type',
        'percentage_pay',
        'description',
        'description_details',
    ];

    protected $appends = [
        'current_price', 'active', 'language_rule', 'total_time', 'progress', 'number_lessons_complete', 'amount_paid_teacher','current_rating'
    ];

    ////////////////////////////////////////////////////////////////

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class);
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

    public function censor()
    {
        return $this->belongsTo(Censor::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function lead()
    {
        return $this->mentor()->get();
    }

    public function getTotalTimeAttribute()
    {

        // if ($this->lessons->isEmpty() == true) {
        //     return 0;
        // }
        return 0;
        // $time =  $this->lessons()->lessonVideo()
        //     ->selectRaw("TIME_FORMAT(SUM(SEC_TO_TIME(time)), '%H') AS time_total")
        //     ->first()
        //     ->time_total;

        // $arr = ['h', 'm', 's'];

        // $time = collect(explode(' ', $time))
        //     ->map(
        //         function ($val, $index) use ($arr) {
        //             return $val . '' . $arr[$index];
        //         }
        //     )->implode(' ');

        // return $time;
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
        if ($this->status == 0) {
            return 'Chờ xử lý';
        } elseif ($this->status == 1) {
            return 'Đã được duyệt';
        } elseif ($this->status == 2) {
            return 'Đã kích hoạt';
        }
    }

    public function getLanguageRuleAttribute()
    {
        $language = $this->language == 0
            ? 'Tiếng việt'
            : 'english';
        return $language;
    }

    public function getProgressAttribute()
    {
            if (!auth()->user()) return null;
            if (!auth()->user()->courses->contains($this->id)) return null;
            $totalLesson = $this->lessons()->count();
            $totalHistory = LessonUser::where('course_id', $this->id)
                ->where('user_id', auth()->user()->id)
                ->count();
            $progress = ($totalLesson > 0) ? ($totalHistory / $totalLesson) * 100 : 0;
            return round($progress, 2, PHP_ROUND_HALF_DOWN);
    }

    public function getNumberLessonsCompleteAttribute()
    {
        if (!auth()->user()) return null;
        if (!auth()->user()->courses->contains($this->id)) return null;
        $totalLesson = LessonUser::where('course_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->count();

        return $totalLesson;
    }

    public function getAmountPaidTeacherAttribute()
    {
        if ($this->percentage_pay == 0) {
            return 0;
        }
        $price = $this->percentage_pay > 0
            ? $this->price - ($this->price * ((100 - $this->percentage_pay) / 100))
            : $this->price;
        return $price;
    }

    public function getCurrentRatingAttribute()
    {
        if (!$this->commentCourses) {
            return 0;
        }
        return round($this->commentCourses->avg('vote'));
    }
}
