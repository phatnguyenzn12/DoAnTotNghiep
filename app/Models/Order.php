<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'status',
        'total_price',
        'user_id',
    ];

    public function orderDetails() {
        return $this->belongsToMany(Course::class,OrderDetail::class);
    }
}
