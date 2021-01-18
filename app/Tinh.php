<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'tinh';
    protected   $fillable       = ['t_ten'];
    protected   $guarded        = ['t_ma'];

    protected   $primaryKey     = 't_ma';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 't_ma', 'nv_noiSinh');
    }
    public function dsHuyen(){
        return $this->hasMany('App\Huyen', 't_ma', 't_ma');
    }
    public function dsQueQuan(){
        return $this->hasMany('App\QueQuan', 't_ma', 't_ma');
    }
}
