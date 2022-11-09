<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseModel extends Model
{
    use HasFactory;


    function scopeOrderByIdDESC($query, Request $request)
    {
        if ($request->has('id')) {
            $query = $query->orderBy($request->id, 'DESC');
        }
        return $query;
    }

    function scopeOrderByIdASC($query, Request $request)
    {
        if ($request->has('id')) {
            $query = $query->orderBy($request->id, 'ASC');
        }
        return $query;
    }
}
