<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable=["contacto_id","start_event","end_event","color","text_color", "allday"];

    public function contacto()
    {
        return $this->belongsTo('App\Contacto');
    }

}
