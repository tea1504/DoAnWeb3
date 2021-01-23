<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    const CREATED_AT = 'cvu_taoMoi';
    const UPDATED_AT = 'cvu_capNhat';

    protected   $table          = 'chucvu';
    protected   $fillable       = ['cvu_ten', 'cvu_moTa', 'cvu_taoMoi', 'cvu_capNhat'];
    protected   $guarded        = ['cvu_ma'];

    protected   $primaryKey     = 'cvu_ma';

    protected $dates            = ['cvu_taoMoi', 'cvu_capNhat'];
    protected $dateFormat       = 'Y-m-d H:i:s';

    public function dsTuyenDung(){
        return $this->hasMany('App\TuyenDung', 'cvu_ma', 'cvu_ma');
    }
    public function dsQuaTrinhCongTac(){
        return $this->hasMany('App\quatrinhcongtac', 'cvu_ma', 'cvu_ma');
    }
    //Quá trình công tác
}
