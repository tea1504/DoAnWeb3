<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiVBCC extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'loai_vbcc';
    protected   $fillable       = ['loaiVBCC_ten'];
    protected   $guarded        = ['loaiVBCC_ma'];

    protected   $primaryKey     = 'loaiVBCC_ma';

    public function dsVBCC(){
        return $this->hasMany('App\VBCC', 'loaiVBCC_ma', 'loaiVBCC_ma');
    }
}
