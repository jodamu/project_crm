<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tablero;
use App\tablero_user;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tablero_user::class, function (Faker $faker) {
    return [
        'user_id'       =>   User::inRandomOrder()->where('role','admin')->first()->id,
        'tablero_id'    =>   Tablero::inRandomOrder()->first()->id,
    ];
});
