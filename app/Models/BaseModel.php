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
        } elseif ($request->id == 'id_asc') {
            $query = $query->orderBy('id', 'ASC');
        }

        if ($request->price == 'price_desc') {
            $query = $query->orderBy('price', 'DESC');
        } elseif ($request->price == 'id_asc') {
            $query = $query->orderBy('price', 'ASC');
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

    function scopeFind($query, Request $request)
    {
        if ($request->has('title') && $request->title != 0) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->has('name') && $request->name != 0) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }

    function scopeCategory($query, Request $request)
    {
        if ($request->has('cate_course') && $request->cate != 0) {
            $query->where('cate_course_id', $request->cate);
        }

        return $query;
    }

    function scopeCheckYear($query, $request)
    {
        if ($request->has('year')  && $request->year != 0) {
            return $query->whereRaw('YEAR(order_details.created_at) = ' . $request->year);
        } else {
            return $query->whereRaw('YEAR(order_details.created_at) = (SELECT YEAR(MAX(order_details.created_at)))');
        }
    }

    function scopeCheckCourse($query, $request)
    {
        if ($request->has('course_id')  && $request->course_id != 0) {
            return $query->whereRaw('courses.id = ' . $request->course_id);
        }
    }
}
