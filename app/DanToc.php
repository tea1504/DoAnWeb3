<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'dantoc';
    protected   $fillable       = ['dt_ten'];
    protected   $guarded        = ['dt_ma'];

    protected   $primaryKey     = 'dt_ma';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'dt_ma', 'dt_ma');
    }
}
