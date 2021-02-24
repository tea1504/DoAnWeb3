<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuyen extends Model
{
    public $timestamps = false;
    protected $table = 'user_quyen';
    protected $fillable = ['nv_ma','q_ma'];
   
    public function quyen(){
        return $this->belongsTo('App\Quyen','q_ma','q_ma');
    }
    
    public function nhanVien(){
        return $this->belongsTo('App\NhanVien','nv_ma','nv_ma');
    }
}
