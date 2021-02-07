<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KyLuat extends Model
{
     const     CREATED_AT     =  'kl_taoMoi';
     const     UPDATED_AT     =  'kl_capNhat';

    protected $table = 'kyluat';
    protected $fillable = ['nv_ma','kl_ngayKy','kl_nguoiKy','kl_lyDo','kl_taoMoi','kl_capNhat'];
    protected $guarded = ['kl_ma'];
    protected $primaryKey ='kl_ma';
    protected $dates =['kl_ngayKy','kl_taoMoi','kl_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
    public function nhanVienKL(){
         return $this->belongsTo('App\NhanVien','nv_ma','nv_ma');
    }
    
    public function nguoiKy(){
         return $this->belongsTo('App\NhanVien','kl_nguoiKy','nv_ma');
    }
}
