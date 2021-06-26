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
        'contacto_id' => $faker->numberBetween(1,2),
        'entidad_id' => $faker->numberBetween(1,Entidad::count()),
        'formacion_id' => $faker->numberBetween(1,Formacion::count()),
        'tipo_acceso_id' => $faker->numberBetween(1,TipoAcceso::count()),
        'fecha_inicio' => $inicio->format('Y-m-d'),
        'fecha_grado' => $fin->format('Y-m-d'),
        'periodo_academico_inicial' => $faker->numberBetween(1,PeriodoAcademico::count()),
        'periodo_academico_final' => $faker->numberBetween(1,PeriodoAcademico::count()),
        'finalizado' => $faker->boolean,
        'promedio' => $faker->randomFloat(2,0,5),
        'periodo_alcanzado' => $faker->randomDigitNotNull
    ];
});
