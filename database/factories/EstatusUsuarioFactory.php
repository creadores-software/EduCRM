<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\EstatusUsuario;
use Faker\Generator as Faker;

$factory->define(EstatusUsuario::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
