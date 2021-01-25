<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViQuanLy extends Model
{
    const CREATED_AT = 'dvql_taoMoi';
    const UPDATED_AT = 'dvql_capNhat';

    protected   $table          = 'donviquanly';
    protected   $fillable       = ['dvql_ten',];
    protected   $guarded        = ['dvql_ma'];

    protected   $primaryKey     = 'dvql_ma';

    protected   $dates            = ['dvql_taoMoi', 'dvql_capNhat'];
    protected   $dateFormat       = 'Y-m-d H:i:s';

    public function dsDonVi()
    {
        return $this->hasMany('App\DonVi', 'dvql_ma', 'dvql_ma');
    }
}
