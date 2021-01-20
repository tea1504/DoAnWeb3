<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    const     CREATED_AT    = 'l_taoMoi';
    const     UPDATED_AT    = 'l_capNhat';

    protected $table        = 'luong';
    protected $fillable     = ['l_tinhTrang','cvu_ma','l_luongCanBan','ng_ma','b_ma'.'pc_ma','l_taoMoi', 'l_capNhat'];
    protected $guarded      = ['l_ma','nv_ma'];

    protected $primaryKey   = ['nb_ma','nv_ma'];

    protected $dates        = ['l_taoMoi', 'l_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function nhanvien_luong(){
        return $this->belongsTo('App\NhanVien','nv_ma','nv_ma');
    }
    public function chucvu_luong(){
        return $this->belongsTo('App\ChucVu','cv_ma','cv_ma');
    }
    public function ngach_luong(){
        return $this->belongsTo('App\Ngach','ng_ma','ng_ma');
    }
    public function bac_luong(){
        return $this->belongsTo('App\Bac','b_ma','b_ma');
    }
    public function phucap_luong(){
        return $this->belongsTo('App\PhuCap','pc_ma','pc_ma');
    }
}