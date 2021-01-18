<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHeGiaDinh extends Model
{
    const     CREATED_AT    = 'qhgd_taoMoi';
    const     UPDATED_AT    = 'qhgd_capNhat';

    protected $table = 'dbnhansu';
    protected $fillable = ['qhgd_ten','qhgd_moiQuanhe','qhgd_namSinh','qhgd_diaChi','qhgd_ngheNghiep','qhgd_taoMoi','qhgd_capNhat','qhgd_nuocNgoai'];
    protected $guarded = ['qhgd_ma'];
    protected $primarykey ='qhgd_ma';
    protected $dates =['qhgd_taoMoi','qhgd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
     public function nhanViens(){
         return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
     }
}
