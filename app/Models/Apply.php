<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = "applys";
    protected $fillable = [
        'name',
        'email',
        'number_phone',
        'Summary'
    ];
}
