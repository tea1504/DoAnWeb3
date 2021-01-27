<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomMau extends Model
{
    const       CREATED_AT      = 'nm_taoMoi';
    const       UPDATED_AT      = 'nm_capNhat';

    protected   $table          = 'nhommau';
    protected   $fillable       = ['nm_ten'];
    protected   $guarded        = ['nm_ma'];

    protected   $primaryKey     = 'nm_ma';
    protected   $dates          = ['nm_taoMoi', 'nm_capNhat'];
    protected   $dateFormat     = 'Y-m-d H:i:s';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'nm_ma', 'nm_ma');
    }
}
