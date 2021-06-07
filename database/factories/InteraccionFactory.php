<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\Interaccion;
use Faker\Generator as Faker;

$factory->define(Interaccion::class, function (Faker $faker) {

    return [
        'fecha_inicio' => $faker->date('Y-m-d H:i:s'),
        'fecha_fin' => $faker->date('Y-m-d H:i:s'),
        'tipo_interaccion_id' => $faker->randomDigitNotNull,
        'estado_interaccion_id' => $faker->randomDigitNotNull,
        'observacion' => $faker->word,
        'oportunidad_id' => $faker->randomDigitNotNull,
        'contacto_id' => $faker->randomDigitNotNull,
        'users_id' => $faker->word
    ];
});
