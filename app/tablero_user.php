<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tablero_user extends Model

{
    public $table="tablero_user";
    protected $fillable = ['user_id', 'tablero_id'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    
}
