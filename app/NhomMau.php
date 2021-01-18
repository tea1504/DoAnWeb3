<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomMau extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'nhommau';
    protected   $fillable       = ['nm_ten'];
    protected   $guarded        = ['nm_ma'];

    protected   $primaryKey     = 'nm_ma';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'nm_ma', 'nm_ma');
    }
}
