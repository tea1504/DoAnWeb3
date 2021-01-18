<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'xa';
    protected   $fillable       = ['x_ten', 'h_ma'];
    protected   $guarded        = ['x_ma'];

    protected   $primaryKey     = 'x_ma';

    public function dsQueQuan(){
        return $this->hasMany('App\QueQuan', 'x_ma', 'x_ma');
    }
    public function huyen(){
        return $this->belongsTo('App\Huyen', 'h_ma', 'h_ma');
    }
}
