<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class Pais extends Model
{
    protected $fillable = ['name'];
    public function estado(){
        return $this->hasMany('App\Estado');
    }
}
