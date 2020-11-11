<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

    protected $fillable=[
        'documento',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'fechanacimiento',
        'ciudad_id',
        'tipo_id',
        'cargo_id',
        'empresa',
        'sector_id',
        'estados_civil_id'
    ];

    public function nombre_completo($query){
        return $query->nombres." ".$query->apellidos;
    }
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }
    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
    public function estado_civil()
    {
        return $this->belongsTo('App\EstadosCivil', 'estados_civil_id', 'id');
    }

    public function tablero()
    {
        return $this->belongsTo('App\Tablero');
    }
}
