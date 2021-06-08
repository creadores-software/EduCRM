<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\Entidad;
use App\Models\Formaciones\CampoEducacion;
use App\Models\Formaciones\Facultad;
use App\Models\Formaciones\Formacion;
use App\Models\Formaciones\Jornada;
use App\Models\Formaciones\Modalidad;
use App\Models\Formaciones\NivelFormacion;
use App\Models\Formaciones\Periodicidad;
use App\Models\Formaciones\Reconocimiento;
use Faker\Generator as Faker;

$factory->define(Formacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->realText(150),
        'entidad_id' => function () {
            return factory(Entidad::class)->create()->id;
        },
        'nivel_formacion_id' => function () {
            return factory(NivelFormacion::class)->create()->id;
        },
        'codigo_snies' => $faker->numerify('####'),
        'titulo_otorgado' =>  $faker->realText(150),
        'campo_educacion_id' => function () {
            return factory(CampoEducacion::class)->create()->id;
        },
        'modalidad_id' => function () {
            return factory(Modalidad::class)->create()->id;
        },
        'jornada_id' => function () {
            return factory(Jornada::class)->create()->id;
        },
        'periodicidad_id' => function () {
            return factory(Periodicidad::class)->create()->id;
        },
        'periodos_duracion' => $faker->randomDigitNotNull,
        'reconocimiento_id' => function () {
            return factory(Reconocimiento::class)->create()->id;
        },
        'costo_matricula' => $faker->randomNumber,
        'activo' => $faker->boolean,
        'facultad_id' => function () {
            return factory(Facultad::class)->create()->id;
        },
    ];
});
