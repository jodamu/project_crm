<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['name','pais_id'];

    public function pais(){
        return $this->belongsTo('App\Pais');
    }

    public function ciudad(){
        return $this->hasMany('App\Ciudad');
    }


}
