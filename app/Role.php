<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const CREATED_AT = 'role_taoMoi';
    const UPDATED_AT = 'role_capNhat';

    protected $table ='role';
    protected $filltable = ['role_ten','role_mota','role_taoMoi','role_capNhat'];
    protected $guarded = ['role_ma'];
    protected $primaryKey ='role_ma';
    protected $dates = ['role_taoMoi','role_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function roleQuyen(){
        return $this->hasMany('App\RoleQuyen','role_ma','role_ma');
    }
    
    public function userQuyen(){
        return $this->hasMany('App\NhanVien','role_ma','role_ma');
    }
}
