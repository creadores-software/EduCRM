<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\TipoContacto;
use Faker\Generator as Faker;

$factory->define(TipoContacto::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
    ];
});
