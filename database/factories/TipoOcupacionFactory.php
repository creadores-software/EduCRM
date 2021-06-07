<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\TipoOcupacion;
use Faker\Generator as Faker;

$factory->define(TipoOcupacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
