<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VBCC extends Model
{
    const CREATED_AT = 'vbcc_taoMoi';
    const UPDATED_AT = 'vbcc_capNhat';

    protected   $table          = 'vanbang_chungchi';
    protected   $fillable       = ['nv_ma', 'vbcc_ten', 'loaiVBCC_ma', 'vbcc_trinhDo', 'vbcc_ngayCap', 'vbcc_taoMoi', 'vbcc_capNhat'];
    protected   $guarded        = ['vbcc_ma'];

    protected   $primaryKey     = 'vbcc_ma';

    protected $dates            = ['vbcc_taoMoi', 'vbcc_capNhat'];
    protected $dateFormat       = 'Y-m-d H:i:s';

    public function dnhanVien(){
        return $this->belongsTo('App\NhanVien', 'nv_ma', 'nv_ma');
    }
    public function loaiVBCC(){
        return $this->belongsTo('App\LoaiVBCC', 'loaiVBCC_ma', 'loaiVBCC_ma');
    }
}
