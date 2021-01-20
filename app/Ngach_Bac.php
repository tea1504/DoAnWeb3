<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngach_Bac extends Model
{
    const     CREATED_AT    = 'nb_taoMoi';
    const     UPDATED_AT    = 'nb_capNhat';

    protected $table        = 'ngach_bac';
    protected $fillable     = ['nb_heSoLuong','nb_taoMoi', 'nb_capNhat'];
    protected $guarded      = ['nb_ma','b_ma','ng_ma'];

    protected $primaryKey   = ['nb_ma','b_ma','ng_ma'];

    protected $dates        = ['nb_taoMoi', 'nb_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function bac_nb(){
        return $this->belongsTo('App\Bac', 'b_ma', 'b_ma');
    }
    public function ngach_nb(){
        return $this->belongsTo('App\Ngach', 'ng_ma', 'ng_ma');
    }
    public function qtct_nb(){
        return $this->belongsTo('App\QuaTrinhCongTac','nb_ma','nb_ma');
    }
}
