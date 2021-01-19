<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    const CREATED_AT = 'q_taoMoi';
    const UPDATED_AT = 'q_capNhat';

    protected $table ='quyen';
    protected $filltable = ['q_ten','q_mota','q_taoMoi','q_capNhat'];
    protected $guarded = ['q_ma'];
    protected $primarykey ='q_ma';
    protected $dates = ['q_taoMoi','q_capNhat'];
    protected $dateFormat = ['Y-m-d H:i:s'];

    public function userQuyen(){
        return $this->belongsTo('App\UserQuyen','q_ma','q_ma');
    }
    
    public function roleQuyen(){
        return $this->belongsTo('App\RoleQuyen','q_ma','q_ma');
    }
}
