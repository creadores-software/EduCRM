<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\Entidad;
use Faker\Generator as Faker;

$factory->define(Entidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'nit' => $faker->word,
        'lugar_id' => $faker->randomDigitNotNull,
        'direccion' => $faker->word,
        'barrio' => $faker->word,
        'correo' => $faker->word,
        'telefono' => $faker->word,
        'sitio_web' => $faker->word,
        'sector_id' => $faker->randomDigitNotNull,
        'actividad_economica_id' => $faker->randomDigitNotNull,
        'codigo_ies' => $faker->word,
        'acreditacion_ies' => $faker->word,
        'calendario' => $faker->word,
        'mi_universidad' => $faker->word
    ];
});
