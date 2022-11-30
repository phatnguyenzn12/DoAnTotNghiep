<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Apply extends Model
{
    use HasFactory;

    protected $table = "applys";
    protected $fillable = [
        'name',
        'email',
        'number_phone',
        'Summary',
        'attachment'
    ];

    public function saveNew($params)
    {
        $data=array_merge($params['cols'],[
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}
