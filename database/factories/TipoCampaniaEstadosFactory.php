<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoCampaniaEstados;
use Faker\Generator as Faker;

$factory->define(TipoCampaniaEstados::class, function (Faker $faker) {

    return [
        'tipo_campania_id' => $faker->randomDigitNotNull,
        'estado_campania_id' => $faker->randomDigitNotNull,
        'orden' => $faker->randomDigitNotNull,
        'dias_cambio' => $faker->randomDigitNotNull
    ];
});
