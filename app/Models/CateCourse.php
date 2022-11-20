<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CateCourse extends Model
{
    use HasFactory;

    protected $table = 'cate_courses';

    protected $fillable = [
        'name',
    ];

    public function courses() {
        return $this->hasMany(Course::class,'cate_course_id','id');
    }

    public function Xoa($id)
    {
        // $id_cate = DB::table('courses')->select(['id'])->where('cate_course_id', $id)->get();
        // foreach ($id_cate as $id1) {
           DB::table('courses')->where('cate_course_id', $id)->update(['type'=>1]);
        // }
        $res = DB::table($this->table)->where('id', $id)->update(['type'=>1]);
        return 1;
    }
   
    public function restore($id,$cate_course_id)
    {
        // $id_cate = DB::table('courses')->select(['id'])->where('cate_course_id', $id)->get();
        // foreach ($id_cate as $id1) {
           DB::table('courses')->where('id', $id)->update(['type'=>0,'cate_course_id'=>$cate_course_id]);
           
        // }
     //   $res = DB::table($this->table)->where('id', $id)->update(['type'=>1]);
        return 1;
    }
}
