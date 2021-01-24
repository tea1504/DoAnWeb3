<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VBCC extends Model
{
    const CREATED_AT = 'vbcc_taoMoi';
    const UPDATED_AT = 'vbcc_capNhat';

    protected   $table          = 'vanbang_chungchi';
    protected   $fillable       = ['nv_ma', 'vbcc_ten', 'lvbcc_ma', 'vbcc_trinhDo', 'vbcc_tuNgay', 'vbcc_denNgay', 'vbcc_tenTruong', 'vbcc_hinhThuc', 'vbcc_taoMoi', 'vbcc_capNhat'];
    protected   $guarded        = ['vbcc_ma'];

    protected   $primaryKey     = 'vbcc_ma';

    protected $dates            = ['vbcc_taoMoi', 'vbcc_capNhat'];
    protected $dateFormat       = 'Y-m-d H:i:s';

    public function nhanVien(){
        return $this->belongsTo('App\NhanVien', 'nv_ma', 'nv_ma');
    }
    public function loaiVBCC(){
        return $this->belongsTo('App\LoaiVBCC', 'lvbcc_ma', 'lvbcc_ma');
    }
}
