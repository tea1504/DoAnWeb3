<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;
    protected $table = 'user_role';
    protected $fillable = ['nv_ma','role_ma'];
   
    public function role(){
        return $this->hasMany('App\Role','role_ma','role_ma');
    }
    
    public function nhanVien(){
        return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
    }

}
