<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrinhDo extends Model
{
    const       CREATED_AT      = 'td_taoMoi';
    const       UPDATED_AT      = 'td_capNhat';

    protected   $table          = 'trinhdo';
    protected   $fillable       = ['td_ten'];
    protected   $guarded        = ['td_ma'];

    protected   $primaryKey     = 'td_ma';
    protected   $dates          = ['td_taoMoi', 'td_capNhat'];
    protected   $dateFormat     = 'Y-m-d H:i:s';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'td_ma', 'td_ma');
    }
}
