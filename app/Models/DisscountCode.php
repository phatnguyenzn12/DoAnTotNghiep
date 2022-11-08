<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisscountCode extends Model
{
    use HasFactory;
    protected $table = 'disscount_codes';
    protected $fillable = [
        'code',
        'discount',
        'start_time',
        'end_time',
    ];
}
