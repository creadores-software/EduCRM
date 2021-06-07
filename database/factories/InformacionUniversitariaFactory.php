<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionUniversitaria;
use Faker\Generator as Faker;

$factory->define(InformacionUniversitaria::class, function (Faker $faker) {

    return [
        'contacto_id' => $faker->randomDigitNotNull,
        'entidad_id' => $faker->randomDigitNotNull,
        'formacion_id' => $faker->randomDigitNotNull,
        'tipo_acceso_id' => $faker->randomDigitNotNull,
        'fecha_inicio' => $faker->word,
        'fecha_grado' => $faker->word,
        'periodo_academico_inicial' => $faker->randomDigitNotNull,
        'periodo_academico_final' => $faker->randomDigitNotNull,
        'finalizado' => $faker->word,
        'promedio' => $faker->randomDigitNotNull,
        'periodo_alcanzado' => $faker->randomDigitNotNull
    ];
});
