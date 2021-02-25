<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngach extends Model
{
    const     CREATED_AT    = 'ng_taoMoi';
    const     UPDATED_AT    = 'ng_capNhat';

    protected $table        = 'ngach';
    protected $fillable     = ['ng_ten','ng_taoMoi', 'ng_capNhat','ng_moTa'];
    protected $guarded      = ['ng_ma'];

    protected $primaryKey   = 'ng_ma';

    protected $dates        = ['ng_taoMoi', 'ng_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function ngach_nb(){
        return $this->hasMany('App\Ngach_Bac', 'ng_ma', 'ng_ma');
    }
    public function ngach_luong(){
        return $this->hasMany('App\Luong', 'ng_ma', 'ng_ma');
    }
    public function dsBac(){
        return $this->belongsToMany('App\Bac', 'ngach_bac', 'ng_ma', 'b_ma')->withPivot('nb_heSoLuong');
    }
}
