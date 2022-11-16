<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'admins';
    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'number_phone',
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
    
    public function PermissionCheck(){
        return $this->guard;
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

    public function saveUpdate($params){
        $dataUpdate = [];
        foreach ($params['cols'] as $colName=>$val){
            if ($colName == 'id') {
                continue;
            }
            //kiem tra ton tai trong mang
            if (in_array($colName, $this->fillable)) {
                $dataUpdate[$colName] = (strlen($val)==0)?null:$val;
            }
        }
        //update dk co id = $params['cols']['id']
        $res = DB::table($this->table)->where('id', $params['cols']['id'])->update($dataUpdate);
        return $res;
    }
}
