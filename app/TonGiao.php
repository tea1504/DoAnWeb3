<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TonGiao extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'tongiao';
    protected   $fillable       = ['tg_ten', 'tg_taoMoi', 'tg_capNhat'];
    protected   $guarded        = ['tg_ma'];

    protected   $primaryKey     = 'tg_ma';

    protected $dates        = ['tg_taoMoi', 'tg_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function dsNhanVien(){
        return $this->hasMany('App\NhanVien', 'tg_ma', 'tg_ma');
    }
}
