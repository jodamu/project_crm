<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EstadosCivil;
use Faker\Generator as Faker;

$factory->define(EstadosCivil::class, function (Faker $faker) {
    return [
        'name'  => $faker->randomElement($array = array('Solter@','Casad@', 'Viud@','Union Libre')),
    ];
});
