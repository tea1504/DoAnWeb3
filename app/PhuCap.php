<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuCap extends Model
{
    const     CREATED_AT    = 'pc_taoMoi';
    const     UPDATED_AT    = 'pc_capNhat';

    protected $table        = 'phucap';
    protected $fillable     = ['pc_ten','pc_heSoPhuCap','pc_taoMoi', 'pc_capNhat'];
    protected $guarded      = ['pc_ma'];

    protected $primaryKey   = 'pc_ma';

    protected $dates        = ['pc_taoMoi', 'pc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
