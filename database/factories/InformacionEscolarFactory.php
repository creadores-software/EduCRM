<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionEscolar;
use Faker\Generator as Faker;

$factory->define(InformacionEscolar::class, function (Faker $faker) {

    return [
        'contacto_id' => $faker->randomDigitNotNull,
        'entidad_id' => $faker->randomDigitNotNull,
        'nivel_formacion_id' => $faker->randomDigitNotNull,
        'fecha_inicio' => $faker->word,
        'fecha_grado' => $faker->word,
        'fecha_icfes' => $faker->word,
        'puntaje_icfes' => $faker->randomDigitNotNull,
        'finalizado' => $faker->word,
        'grado' => $faker->randomDigitNotNull
    ];
});
