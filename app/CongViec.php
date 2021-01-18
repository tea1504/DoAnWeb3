<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongViec extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'congviec';
    protected   $fillable       = ['cv_ten', 'cv_moTa'];
    protected   $guarded        = ['cv_ma'];

    protected   $primaryKey     = 'cv_ma';

    public function dsTuyenDung(){
        return $this->hasMany('App\TuyenDung', 'cv_ma', 'cv_ma');
    }
}
