<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KyLuat extends Model
{
    const     CREATED_AT    = 'kl_taoMoi';
    const     UPDATED_AT    = 'kl_capNhat';

    protected $table = 'dbnhansu';
    protected $fillable = ['kl_ngayKy','kl_nguoiKy','kl_lyDo','kl_taoMoi','kl_capNhat'];
    protected $guarded = ['kl_ma'];
    protected $primarykey ='kl_ma';
    protected $dates =['kl_taoMoi','kl_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
    public function nhanViens(){
         return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
    }
    
    public function nhanVienss(){
         return $this->hasMany('App\NhanVien','kl_nguoiky','nv_ma');
    }
}
