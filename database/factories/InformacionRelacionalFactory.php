<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use Faker\Generator as Faker;

$factory->define(InformacionRelacional::class, function (Faker $faker) {

    return [
        'maximo_nivel_formacion_id' => $faker->randomDigitNotNull,
        'ocupacion_actual_id' => $faker->randomDigitNotNull,
        'estilo_vida_id' => $faker->randomDigitNotNull,
        'religion_id' => $faker->randomDigitNotNull,
        'raza_id' => $faker->randomDigitNotNull,
        'generacion_id' => $faker->randomDigitNotNull,
        'personalidad_id' => $faker->randomDigitNotNull,
        'beneficio_id' => $faker->randomDigitNotNull,
        'frecuencia_uso_id' => $faker->randomDigitNotNull,
        'estatus_usuario_id' => $faker->randomDigitNotNull,
        'estatus_lealtad_id' => $faker->randomDigitNotNull,
        'estado_disposicion_id' => $faker->randomDigitNotNull,
        'actitud_servicio_id' => $faker->randomDigitNotNull,
        'autoriza_comunicacion' => $faker->word
    ];
});
