<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    const CREATED_AT = 'dv_taoMoi';
    const UPDATED_AT = 'dv_capNhat';

    protected   $table          = 'donvi';
    protected   $fillable       = ['dv_ten', 'dvql_ma'];
    protected   $guarded        = ['dv_ma'];

    protected   $primaryKey     = 'dv_ma';

    protected   $dates            = ['dv_taoMoi', 'dv_capNhat'];
    protected   $dateFormat       = 'Y-m-d H:i:s';

    public function dsTuyenDung()
    {
        return $this->hasMany('App\TuyenDung', 'dv_ma', 'dv_ma');
    }
    public function donViQuanLy()
    {
        return $this->belongsTo('App\DonViQuanLy', 'dvql_ma', 'dvql_ma');
    }
}
