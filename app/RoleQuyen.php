<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleQuyen extends Model
{
    public $timestamps = false;
    protected $table = 'role_quyen';
    protected $fillable = ['role_ma','q_ma'];
   
    public function role(){
        return $this->hasMany('App\Role','role_ma','role_ma');
    }
    
    public function quyen(){
        return $this->hasMany('App\Quyen','q_ma','q_ma');
    }

}
