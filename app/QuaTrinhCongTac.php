<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuaTrinhCongTac extends Model
{
    const     CREATED_AT    = 'qtct_taoMoi';
    const     UPDATED_AT    = 'qtct_capNhat';

    protected $table        = 'quatrinhcongtac';
    protected $fillable     = ['qtct_tungay','qtct_denNgay','cvu_ma','dv_ma','nb_ma','qtct_taoMoi', 'qtct_capNhat'];
    protected $guarded      = ['qtct_ma','nv_ma'];

    protected $primaryKey   = ['qtct_ma','nv_ma'];

    protected $dates        = ['qtct_taoMoi', 'qtct_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
