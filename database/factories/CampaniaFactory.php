<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\Campania;
use Faker\Generator as Faker;

$factory->define(Campania::class, function (Faker $faker) {

    return [
        'tipo_campania_id' => $faker->randomDigitNotNull,
        'nombre' => $faker->word,
        'periodo_academico_id' => $faker->randomDigitNotNull,
        'equipo_mercadeo_id' => $faker->randomDigitNotNull,
        'fecha_inicio' => $faker->word,
        'fecha_final' => $faker->word,
        'descripcion' => $faker->text,
        'inversion' => $faker->randomDigitNotNull,
        'nivel_formacion_id' => $faker->randomDigitNotNull,
        'nivel_academico_id' => $faker->randomDigitNotNull,
        'facultad_id' => $faker->randomDigitNotNull,
        'segmento_id' => $faker->randomDigitNotNull,
        'activa' => $faker->word
    ];
});
