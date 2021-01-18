<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrinhDo extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'trinhdo';
    protected   $fillable       = ['td_ten'];
    protected   $guarded        = ['td_ma'];

    protected   $primaryKey     = 'td_ma';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'td_ma', 'td_ma');
    }
}
