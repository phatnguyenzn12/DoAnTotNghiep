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

    function scopeIsActive($query, Request $request)
    {
        if ($request->is_active == 'active') {
            $query = $query->where('is_active', 1);
        } elseif ($request->is_active == 'in_active'){
            $query = $query->where('is_active', 0);
        }

        if ($request->is_check == 'active') {
            $query = $query->where('is_check', 1);
        } elseif ($request->is_check == 'in_active'){
            $query = $query->where('is_check', 0);
        }elseif($request->is_check == 'fix'){
            $query = $query->where('is_check', 2);
        }

        if ($request->type == 'active') {
            $query = $query->where('type', 1);
        } elseif ($request->type == 'in_active') {
            $query = $query->where('type', 0);
        }

        if ($request->is_demo == 'onl') {
            $query = $query->where('is_demo', 1);
        } elseif ($request->is_demo == 'off') {
            $query = $query->where('is_demo', 0);
        }

        return $query;
    }

    function scopePrice($query, Request $request)
    {
        if ($request->price != 0 && $request->has('price')) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->discount == 'sale') {
            $query->where('discount', '>', 0);
        }

        return $query;
    }

    function scopeSearch($query, Request $request)
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
        if ($request->has('cate_course') && $request->cate_course != 0) {
            $query->where('cate_course_id', $request->cate_course);
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
