<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    const       CREATED_AT      = 'h_taoMoi';
    const       UPDATED_AT      = 'h_capNhat';

    protected   $table          = 'huyen';
    protected   $fillable       = ['h_ten', 't_ma'];
    protected   $guarded        = ['h_ma'];

    protected   $primaryKey     = 'h_ma';
    protected   $dates          = ['h_taoMoi', 'h_capNhat'];
    protected   $dateFormat     = 'Y-m-d H:i:s';

    public function dsXa(){
        return $this->hasMany('App\Xa', 'h_ma', 'h_ma');
    }
    public function dsQueQuan(){
        return $this->hasMany('App\QueQuan', 'h_ma', 'h_ma');
    }
    public function tinh(){
        return $this->belongsTo('App\Tinh', 't_ma', 't_ma');
    }
}
