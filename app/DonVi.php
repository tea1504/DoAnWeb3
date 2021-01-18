<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'donvi';
    protected   $fillable       = ['dv_ten'];
    protected   $guarded        = ['dv_ma'];

    protected   $primaryKey     = 'dv_ma';

    public function dsTuyenDung(){
        return $this->hasMany('App\TuyenDung', 'dv_ma', 'dv_ma');
    }
    //Quá trình công tác
}
