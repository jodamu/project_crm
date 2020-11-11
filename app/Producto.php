<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable=['nombre','descripcion','stock','valor_compra','valor_venta'];
}
