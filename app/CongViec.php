<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongViec extends Model
{
    const CREATED_AT = 'cv_taoMoi';
    const UPDATED_AT = 'cv_capNhat';

    protected   $table          = 'congviec';
    protected   $fillable       = ['cv_ten', 'cv_moTa'];
    protected   $guarded        = ['cv_ma'];

    protected   $primaryKey     = 'cv_ma';

    protected   $dates            = ['cv_taoMoi', 'cv_capNhat'];
    protected   $dateFormat       = 'Y-m-d H:i:s';

    public function dsTuyenDung(){
        return $this->hasMany('App\TuyenDung', 'cv_ma', 'cv_ma');
    }
}
