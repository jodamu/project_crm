<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    $valor=$faker->numberBetween($min = 1000, $max = 30000);
    return [
        'nombre'  => $faker->unique()->sentence(2),
        'descripcion'  => $faker->paragraph(),
        'stock'  => $faker->numberBetween($min = 1, $max = 50),
        'valor_compra'  => $valor,
        'valor_venta'  => $valor*1.19,
    ];
});
