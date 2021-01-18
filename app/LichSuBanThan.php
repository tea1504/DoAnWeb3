<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSuBanThan extends Model
{
    public $timestamps = false;

    protected $table = 'lichsubanthan';
    protected $fillable = ['nv_ma','lsbt_hanhViPhamToi','lsbt_thamGiaToChucChinhTri'];
    protected $guarded = ['lsbt_ma'];
    protected $primarykey ='lsbt_ma';
    
    
     public function nhanVien(){
         return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
     }
}
