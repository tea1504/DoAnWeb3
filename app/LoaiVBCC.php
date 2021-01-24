<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiVBCC extends Model
{
    const CREATED_AT = 'lvbcc_taoMoi';
    const UPDATED_AT = 'lvbcc_capNhat';

    protected   $table          = 'loai_vbcc';
    protected   $fillable       = ['lvbcc_ten', 'lvbcc_taoMoi', 'lvbcc_capNhat'];
    protected   $guarded        = ['lvbcc_ma'];

    protected   $primaryKey     = 'lvbcc_ma';

    protected $dates            = ['lvbcc_taoMoi', 'lvbcc_capNhat'];
    protected $dateFormat       = 'Y-m-d H:i:s';

    
    public function dsVBCC(){
        return $this->hasMany('App\VBCC', 'lvbcc_ma', 'lvbcc_ma');
    }
}
