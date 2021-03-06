<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSuBanThan extends Model
{
    const       CREATED_AT      = 'lsbt_taoMoi';
    const       UPDATED_AT      = 'lsbt_capNhat';

    protected   $table          = 'lichsubanthan';
    protected $fillable = ['nv_ma','lsbt_hanhViPhamToi','lsbt_thamGiaToChucChinhTri'];
    protected $guarded = ['lsbt_ma'];
    protected $primaryKey ='lsbt_ma';

    protected   $dates          = ['lsbt_taoMoi', 'lsbt_capNhat'];
    protected   $dateFormat     = 'Y-m-d H:i:s';
    
     public function nhanVien(){
         return $this->belongsTo('App\NhanVien','nv_ma','nv_ma');
     }
}
