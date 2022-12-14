<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends BaseModel
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'title',
        'content',
        'status',
        'type',
        'sort',
        'discount_code_id',
        'image'
    ];

    public function discountCode(){
        return $this->belongsTo(DiscountCode::class,'discount_code_id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
