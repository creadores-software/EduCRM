<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\Oportunidad;
use Faker\Generator as Faker;

$factory->define(Oportunidad::class, function (Faker $faker) {

    return [
        'campania_id' => $faker->randomDigitNotNull,
        'contacto_id' => $faker->randomDigitNotNull,
        'formacion_id' => $faker->randomDigitNotNull,
        'responsable_id' => $faker->word,
        'estado_campania_id' => $faker->randomDigitNotNull,
        'justificacion_estado_campania_id' => $faker->randomDigitNotNull,
        'interes' => $faker->randomDigitNotNull,
        'capacidad' => $faker->randomDigitNotNull,
        'categoria_oportunidad_id' => $faker->randomDigitNotNull,
        'ingreso_recibido' => $faker->randomDigitNotNull,
        'ingreso_proyectado' => $faker->randomDigitNotNull,
        'adicion_manual' => $faker->word,
        'ultima_actualizacion' => $faker->date('Y-m-d H:i:s'),
        'ultima_interaccion' => $faker->date('Y-m-d H:i:s')
    ];
});
