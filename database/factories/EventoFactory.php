<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contacto;
use App\Evento;
use Faker\Generator as Faker;

$factory->define(Evento::class, function (Faker $faker) {
    $fecha=$faker->dateTimeBetween($startDate = '-1 years', $endDate = '+2 years', $timezone = null);
    return [
        
        'contacto_id'  => Contacto::inRandomOrder()->first()->id,
        'start_event'  => $fecha,
        'end_event'  => $fecha,
        'color'  => $faker->hexcolor,
        'text_color'  => $faker->hexcolor,
    ];
});
