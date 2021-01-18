<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueQuan extends Model
{
    const CREATED_AT = 'qq_taoMoi';
    const UPDATED_AT = 'qq_capNhat';

    protected   $table          = 'quequan';
    protected   $fillable       = ['nv_ma', 'x_ma', 'h_ma', 't_ma', 'qq_diaChi'];
    protected   $guarded        = ['qq_ma'];

    protected   $primaryKey     = 'qq_ma';

    protected $dates            = ['qq_taoMoi', 'qq_capNhat'];
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
