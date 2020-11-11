<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosCivil extends Model
{
    protected $fillable = ['name'];

    public function contacto()
    {
        return $this->hasMany('App\Contacto');
    }
}
