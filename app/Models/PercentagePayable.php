<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercentagePayable extends BaseModel
{
    use HasFactory;

    protected $table = 'percentage_payable';

    protected $fillable = [
        'mentor_id',
        'order_detail_id',
        'amount_paid_admin',
        'amount_paid_teacher',
    ];

    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_detail_id');
    }
}
