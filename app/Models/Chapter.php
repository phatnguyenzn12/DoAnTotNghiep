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
        'sort',
        'mentor_id',
        'title',
        'number',
        'deadline',
        'course_id',
        'deadline',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, ChapterReview::class);
    }

    public function scopeCheckReviewUser()
    {
        if ($this->users->isEmpty() == false) {
            return $this->users()->where('user_id', auth()->user()->id)->get();
        }else{
            return null;
        }
    }
}
