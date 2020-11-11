<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    protected $fillable = ['name'];

    public function tablero()
    {
        return $this->hasMany('App\Tablero')->orderBy('posicion');
    }
}
