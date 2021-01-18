<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngach extends Model
{
    const     CREATED_AT    = 'ng_taoMoi';
    const     UPDATED_AT    = 'ng_capNhat';

    protected $table        = 'ngach';
    protected $fillable     = ['ng_ten','ng_taoMoi', 'ng_capNhat'];
    protected $guarded      = ['ng_ma'];

    protected $primaryKey   = 'ng_ma';

    protected $dates        = ['ng_taoMoi', 'ng_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
