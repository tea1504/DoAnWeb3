<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoiSinh extends Model
{
    const CREATED_AT = 'ns_taoMoi';
    const UPDATED_AT = 'ns_capNhat';

    protected   $table          = 'quequan';
    protected   $fillable       = ['nv_ma', 'x_ma', 'h_ma', 't_ma', 'ns_diaChi'];
    protected   $guarded        = ['ns_ma'];

    protected   $primaryKey     = 'ns_ma';

    protected $dates            = ['ns_taoMoi', 'ns_capNhat'];
    protected $dateFormat       = 'Y-m-d H:i:s';
    
    public function nhanVien(){
        return $this->belongsTo('App\NhanVien', 'nv_ma', 'nv_ma');
    }
    public function xa(){
        return $this->belongsTo('App\Xa', 'x_ma', 'x_ma');
    }
    public function huyen(){
        return $this->belongsTo('App\Huyen', 'h_ma', 'h_ma');
    }
    public function tinh(){
        return $this->belongsTo('App\Tinh', 't_ma', 't_ma');
    }
}
