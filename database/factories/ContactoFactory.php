<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cargo;
use App\Ciudad;
use App\Contacto;
use App\EstadosCivil;
use App\Sector;
use App\Tipo;
use Faker\Generator as Faker;

$factory->define(Contacto::class, function (Faker $faker) {
    $fecha=$faker->dateTimeBetween($startDate = '-50 years', $endDate = '-15 years', $timezone = null);
    return [
        'documento'        => $faker->unique()->postcode,
        'nombres'          => $faker->firstName,
        'apellidos'        => $faker->lastName,
        'email'            => $faker->unique()->email,
        'telefono'         => $faker->phoneNumber,
        'fechanacimiento'  => $fecha,
        'ciudad_id'        => Ciudad::inRandomOrder()->first()->id,
        'tipo_id'          => Tipo::inRandomOrder()->first()->id,
        'cargo_id'         => Cargo::inRandomOrder()->first()->id,
        'empresa'          => $faker->company,
        'sector_id'        => Sector::inRandomOrder()->first()->id,
        'estados_civil_id' => EstadosCivil::inRandomOrder()->first()->id,
    ];
});
