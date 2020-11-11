<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tablero extends Model
{
    protected $fillable = ['contacto_id','panel_id','posicion'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    
    public function panels()
    {
        return $this->belongsTo('App\Panel');
    }

    public function contacto()
    {
        return $this->belongsTo('App\Contacto');
    }



}
