<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhenThuong extends Model
{
    const     CREATED_AT    = 'kt_taoMoi';
    const     UPDATED_AT    = 'kt_capNhat';

    protected $table = 'dbnhansu';
    protected $fillable = ['kt_ngayKy','kt_nguoiKy','kt_lyDo','kt_taoMoi','kt_capNhat'];
    protected $guarded = ['kt_ma'];
    protected $primarykey ='kt_ma';
    protected $dates =['kt_taoMoi','kt_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
    public function nhanViens(){
         return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
    }
    
    public function nhanVienss(){
         return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
    }
}
