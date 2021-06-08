<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionUniversitaria;
use App\Models\Entidades\Entidad;
use App\Models\Formaciones\Formacion;
use App\Models\Formaciones\PeriodoAcademico;
use App\Models\Formaciones\TipoAcceso;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(InformacionUniversitaria::class, function (Faker $faker) {
    $inicio=Carbon::createFromTimeStamp($faker->dateTimeBetween('-10 years', '-1 years')->getTimestamp());
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMonths($faker->numberBetween(1,60));
    return [
        'contacto_id' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'entidad_id' => function () {
            return factory(Entidad::class)->create()->id;
        },
        'formacion_id' => function () {
            return factory(Formacion::class)->create()->id;
        },
        'tipo_acceso_id' => function () {
            return factory(TipoAcceso::class)->create()->id;
        },
        'fecha_inicio' => $inicio->format('Y-m-d'),
        'fecha_grado' => $fin->format('Y-m-d'),
        'periodo_academico_inicial' => function () {
            return factory(PeriodoAcademico::class)->create()->id;
        },
        'periodo_academico_final' => function () {
            return factory(PeriodoAcademico::class)->create()->id;
        },
        'finalizado' => $faker->boolean,
        'promedio' => $faker->randomFloat(2,0,5),
        'periodo_alcanzado' => $faker->randomDigitNotNull
    ];
});
