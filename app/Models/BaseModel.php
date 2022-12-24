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

        if ($request->reply == 'reply_desc') {
            $query = $query->orderBy('reply', 'DESC');
        } elseif ($request->reply == 'reply_asc') {
            $query = $query->orderBy('reply', 'ASC');
        }

        return $query;
    }

    function scopeSortDataCourse($query, Request $request)
    {
        if ($request->id == 'id_desc') {
            $query = $query->orderBy('courses.id', 'DESC');
        } elseif ($request->id == 'id_asc') {
            $query = $query->orderBy('courses.id', 'ASC');
        }
    }

    function scopeIsActive($query, Request $request)
    {
        if ($request->is_active == 'active') {
            $query = $query->where('is_active', 1);
        } elseif ($request->is_active == 'in_active') {
            $query = $query->where('is_active', 0);
        }

        if ($request->is_check == 'active') {
            $query = $query->where('is_check', 1);
        } elseif ($request->is_check == 'in_active') {
            $query = $query->where('is_check', 0);
        } elseif ($request->is_check == 'fix') {
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

        if ($request->status == 'active') {
            $query = $query->where('status', 1);
        } elseif ($request->status == 'in_active') {
            $query = $query->where('status', 0);
        } elseif ($request->status == 'fix') {
            $query = $query->where('status', 2);
        }

        if ($request->language == 'viet') {
            $query = $query->where('language', 0);
        } elseif ($request->language == 'english') {
            $query = $query->where('language', 1);
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

    function scopeSkill($query, Request $request)
    {
        if ($request->has('skill') && $request->skill != 0) {
            $query->where('skill_id', $request->skill);
        }

        return $query;
    }

    function scopeTeacher($query, Request $request)
    {
        if ($request->has('teacher') && $request->teacher != 0) {
            $query->where('mentor_id', $request->teacher);
        }

        return $query;
    }

    function scopeTime($query, string $col_name, Request $request)
    {
        if ($request->has('start_time') && $request->start_time != 0) {
            $query->where($col_name, '>=',  str_replace('T', ' ', $request->start_time));
        } elseif ($request->has('end_time') && $request->end_time != 0) {
            $query->where($col_name, '<=',  str_replace('T', ' ', $request->end_time));
        }
    }

    function scopeCheckYear($query, string $col_name, Request $request)
    {
        if ($request->has('year') && $request->year != 0) {
            return $query->whereRaw("YEAR($col_name ) = $request->year");
        }
    }

    function scopeCheckMonth($query, string $col_name, Request $request)
    {

        if ($request->has('month') && $request->month != 0) {
            return $query->whereRaw("MONTH($col_name) = $request->month");
        }
    }

    function scopeCheckDay($query, string $col_name, Request $request)
    {

        if ($request->has('day') && $request->day != 0) {
            return  $query->whereRaw("DAY($col_name) <= $request->day");
        }
    }

    // function scopeSelectRawTurnover($query, $auth)
    // {
    //     if ($auth == 'admin') {
    //         return $query->selectRaw('CAST( SUM( order_details.price - (order_details.price * 0.2) ) AS UNSIGNED ) as total');
    //     } elseif ($auth == 'teacher') {
    //         return $query->selectRaw('CAST( SUM( order_details.price - (order_details.price * 0.8) ) AS UNSIGNED ) as total');
    //     } elseif ($auth == 'all') {
    //         return $query->selectRaw('CAST( SUM( order_details.price ) AS UNSIGNED ) as total');
    //     }
    // }
}
