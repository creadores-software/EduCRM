<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoInteraccionEstados;
use Faker\Generator as Faker;

$factory->define(TipoInteraccionEstados::class, function (Faker $faker) {

    return [
        'tipo_interaccion_id' => $faker->randomDigitNotNull,
        'estado_interaccion_id' => $faker->randomDigitNotNull
    ];
});
