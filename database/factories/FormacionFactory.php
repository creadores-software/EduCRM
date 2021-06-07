<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(Formacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'entidad_id' => $faker->randomDigitNotNull,
        'nivel_formacion_id' => $faker->randomDigitNotNull,
        'codigo_snies' => $faker->randomDigitNotNull,
        'titulo_otorgado' => $faker->word,
        'campo_educacion_id' => $faker->randomDigitNotNull,
        'modalidad_id' => $faker->randomDigitNotNull,
        'jornada_id' => $faker->randomDigitNotNull,
        'periodicidad_id' => $faker->randomDigitNotNull,
        'periodos_duracion' => $faker->randomDigitNotNull,
        'reconocimiento_id' => $faker->randomDigitNotNull,
        'costo_matricula' => $faker->randomDigitNotNull,
        'activo' => $faker->word,
        'facultad_id' => $faker->randomDigitNotNull
    ];
});
