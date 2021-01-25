<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuyenDung extends Model
{
    const CREATED_AT = 'td_taoMoi';
    const UPDATED_AT = 'td_capNhat';

    protected   $table          = 'tuyendung';
    protected   $fillable       = ['nv_ma', 'td_ngay', 'td_ngheTruocDay', 'dv_ma', 'td_coQuanTuyen', 'cvu_ma', 'td_ngayLam', 'cv_ma', 'td_soTruong', 'td_taoMoi', 'td_capNhat'];
    protected   $guarded        = ['td_ma'];

    protected   $primaryKey     = 'td_ma';

    protected $dates            = ['td_taoMoi', 'td_capNhat', 'td_ngay', 'td_ngayLam'];
    protected $dateFormat       = 'Y-m-d H:i:s';

    public function nhanVien(){
        return $this->belongsTo('App\NhanVien', 'nv_ma', 'nv_ma');
    }
    public function congViec(){
        return $this->belongsTo('App\CongViec', 'cv_ma', 'cv_ma');
    }
    public function chucVu(){
        return $this->belongsTo('App\ChucVu', 'cvu_ma', 'cvu_ma');
    }
    public function donVi(){
        return $this->belongsTo('App\DonVi', 'dv_ma', 'dv_ma');
    }
}
