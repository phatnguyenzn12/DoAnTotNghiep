<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    protected $table = 'discount_codes';
    protected $fillable = [
        'code',
        'discount',
        'content',
        'start_time',
        'end_time',
        'title',
        'slug',
        'status',
    ];
}
