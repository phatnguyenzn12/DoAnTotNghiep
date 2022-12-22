<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class Mentor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'mentors';
    protected $guard = 'mentor';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'avatar',
        'number_phone',
        'is_active',
        'address',
        'cate_course_id',
        'social_networks',
        'educations',
        'specializations',
        'about_me',
        'years_in_experience',
        'salary_bonus'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function notifications_custom()
    {
        return $this->hasMany(Notification::class, 'notifiable_id');
    }

    public function cate_course()
    {
        return $this->belongsTo(CateCourse::class, 'cate_course_id');
    }

    public function history_withdrawal()
    {
        return $this->hasMany(HistoryWithdrawal::class);
    }


    public function PermissionCheck()
    {
        return $this->guard;
    }

    public function loadList()
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $list = $query->get();
        return $list;
    }

    public function saveNew($data)
    {
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function actived($id, $status)
    {
        if ($status == 1) {
            $res = DB::table($this->table)->where('id', $id)->update(['is_active' => 0]);
        } else {
            $res = DB::table($this->table)->where('id', $id)->update(['is_active' => 1]);
        }

        return $res;
    }

    public function loadOne($id)
    {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function updatePass($id, $password)
    {
        $res = DB::table($this->table)->where('id', $id)->update(['password' => $password, 'remember_token' => null]);
        return $res;
    }

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

    function scopeCheckCourse($query, $request)
    {
        if ($request->has('course_id')  && $request->course_id != 0) {
            return $query->whereRaw('courses.id = ' . $request->course_id);
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

}
