<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    public      $timestamps     = false;

    protected   $table          = 'huyen';
    protected   $fillable       = ['h_ten', 't_ma'];
    protected   $guarded        = ['h_ma'];

    protected   $primaryKey     = 'h_ma';

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
