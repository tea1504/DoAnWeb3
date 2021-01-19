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
}
