<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
    const       CREATED_AT      = 'dt_taoMoi';
    const       UPDATED_AT      = 'dt_capNhat';

    protected   $table          = 'dantoc';
    protected   $fillable       = ['dt_ten'];
    protected   $guarded        = ['dt_ma'];

    protected   $primaryKey     = 'dt_ma';
    protected   $dates          = ['dt_taoMoi', 'dt_capNhat'];
    protected   $dateFormat     = 'Y-m-d H:i:s';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'dt_ma', 'dt_ma');
    }
}
