<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bac extends Model
{
    const     CREATED_AT    = 'b_taoMoi';
    const     UPDATED_AT    = 'b_capNhat';

    protected $table        = 'bac';
    protected $fillable     = ['b_ten','b_taoMoi', 'b_capNhat'];
    protected $guarded      = ['b_ma'];

    protected $primaryKey   = 'b_ma';

    protected $dates        = ['b_taoMoi', 'b_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function bac_nb(){
        return $this->hasMany('App\Ngach_Bac', 'b_ma', 'b_ma');
    }
    public function bac_luong(){
        return $this->hasMany('App\Luong', 'b_ma', 'b_ma');
    }
    public function dsNgach(){
        return $this->belongsToMany('App\Ngach', 'ngach_bac', 'ng_ma', 'b_ma');
    }
}
