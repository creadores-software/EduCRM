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
        'entidad_id' => $faker->numberBetween(1,Entidad::count()),
        'nivel_formacion_id' => $faker->numberBetween(1,NivelFormacion::count()),
        'codigo_snies' => Formacion::count(),
        'titulo_otorgado' =>  $faker->realText(150),
        'campo_educacion_id' => $faker->numberBetween(1,CampoEducacion::count()),
        'modalidad_id' => $faker->numberBetween(1,Modalidad::count()),
        'jornada_id' => $faker->numberBetween(1,Jornada::count()),
        'periodicidad_id' => $faker->numberBetween(1,Periodicidad::count()),
        'periodos_duracion' => $faker->randomDigitNotNull,
        'reconocimiento_id' => $faker->numberBetween(1,Reconocimiento::count()),
        'costo_matricula' => $faker->randomNumber,
        'activo' => $faker->boolean,
        'facultad_id' => $faker->numberBetween(1,Facultad::count()),
    ];
});
