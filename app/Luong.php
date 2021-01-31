<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    const     CREATED_AT    = 'l_taoMoi';
    const     UPDATED_AT    = 'l_capNhat';

    protected $table        = 'luong';
    protected $fillable     = ['l_tinhTrang','nv_ma','ng_ma','b_ma','pc_ma','l_taoMoi', 'l_capNhat'];
    protected $guarded      = ['l_ma'];

    protected $primaryKey   = 'l_ma';

    protected $dates        = ['l_taoMoi', 'l_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function nhanvien_luong(){
        return $this->belongsTo('App\NhanVien','nv_ma','nv_ma');
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
