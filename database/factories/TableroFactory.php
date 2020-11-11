<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contacto;
use App\Panel;
use App\Tablero;
use Faker\Generator as Faker;

$factory->define(Tablero::class, function (Faker $faker) {
   
    return [
        'contacto_id'   => Contacto::inRandomOrder()->first()->id,
        'panel_id'      => Panel::inRandomOrder()->first()->id,
        'posicion'      => $faker->numberBetween($min = 1, $max = 2),
    ];
});
//'titulo','telefono','email','panel_id','posicion'