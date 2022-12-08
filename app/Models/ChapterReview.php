<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterReview extends Model
{
    use HasFactory;

    protected $table = 'chapter_reviews';

    protected $fillable = [
        'votes',
        'chapter_id',
        'user_id',
        'content'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
