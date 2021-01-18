<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TonGiao extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'tongiao';
    protected   $fillable       = ['tg_ten'];
    protected   $guarded        = ['tg_ma'];

    protected   $primaryKey     = 'tg_ma';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'tg_ma', 'tg_ma');
    }
}
