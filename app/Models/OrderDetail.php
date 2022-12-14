<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'id',
        'course_id',
        'order_id',
        'price',
    ];

    public $timestamps = false;

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

}
