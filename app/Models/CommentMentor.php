<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMentor extends Model
{
    use HasFactory;
    protected $table = 'comment_mentors';
    protected $fillable = [
        'comment',
        'vote',
        'user_id',
        'reply',
        'status',
        'mentor_id',
    ];
}
