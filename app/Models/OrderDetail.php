<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends BaseModel
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'id',
        'course_id',
        'order_id',
        'percentage_pay',
        'price',
    ];

    public $timestamps = true;
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function percentage_payable()
    {
        return $this->hasOne(PercentagePayable::class);
    }

}
