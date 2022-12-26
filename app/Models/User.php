<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'participant',
        'number_phone',
        'social_id',
        'social_type',
        'about_me',
        'education',
        'location',
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

    public function courses() {
        return $this->belongsToMany(Course::class,OwnerCourse::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function discountCodes() {
        return $this->hasMany(DisscountCode::class,'user_id','id');
    }

    public function carts() {
        return $this->belongsToMany(Course::class,Cart::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function lesson_user(){
        return $this->belongsToMany(Lesson::class,LessonUser::class);
    }

    public function course_user(){
        return $this->belongsToMany(Course::class,LessonUser::class);
    }

    public function notifications_custom()
    {
        return $this->hasMany(Notification::class,'notifiable_id');
    }

    public function certificate()
    {
        return $this->belongsToMany(Certificate::class,UserCertificate::class);
    }

    public function chapter_review()
    {
        return $this->belongsToMany(Chapter::class,ChapterReview::class);
    }

    public function comment_course() {
        return $this->hasMany(CommentCourse::class);
    }

    function scopeName($query, Request $request)
    {
        if ($request->has('name') && $request->name != 0) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }

    public function saveNew($data)
    {
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    public function active_account($id){
        $res = DB::table($this->table)->where('id', $id)->update(['remember_token'=>null]);
        return $res;
    }

    public function updateToken($id,$token){
        $res = DB::table($this->table)->where('id', $id)->update(['remember_token'=>$token]);
        return $res;
    }

    public function updatePass($id,$password){
        $res = DB::table($this->table)->where('id', $id)->update(['password'=>$password,'remember_token'=>null]);
        return $res;
    }

    public function loadOne($id)
    {
        $query = DB::table($this->table)->where('id', '=', $id);
        $obj = $query->first();
        return $obj;
    }

    public function dlt($id, $params = null)
    {
        $res = DB::table($this->table)->where('id', $id)->delete();
        return $res;
    }
}
