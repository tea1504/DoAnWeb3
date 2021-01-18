<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSuBanThan extends Model
{
    

    protected $table = 'dbnhansu';
    protected $fillable = ['lsbt_hanhViPhamToi','lsbt_thamGiaToChucChinhTri'];
    protected $guarded = ['lsbt_ma'];
    protected $primarykey ='lsbt_ma';
    
    
     public function nhanViens(){
         return $this->hasMany('App\NhanVien','nv_ma','nv_ma');
     }
}
