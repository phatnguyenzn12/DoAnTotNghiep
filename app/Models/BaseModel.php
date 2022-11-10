<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseModel extends Model
{ 
    use HasFactory;


    function scopeSortData($query, Request $request)
    {
        if ($request->id == 'id_desc') {
            $query = $query->orderBy('id', 'DESC');
        }elseif($request->id == 'id_asc'){
            $query = $query->orderBy('id', 'ASC');
        }
        
        return $query;
    }

    function scopePrice($query, Request $request)
    {
        if ($request->price != 0 && $request->has('price')) {
            $query->where('price', '<', $request->price);
        }

        return $query;
    }

    function scopeTitle($query, Request $request)
    {
        if ($request->has('title') && $request->title != 0) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        return $query;
    }

    function scopeCateCourse($query, Request $request)
    {
        if ($request->has('cate') && $request->cate != 0) {
            $query->where('cate_course_id', $request->cate );
        }

        return $query;
    }
}
