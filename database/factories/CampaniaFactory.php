<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\EquipoMercadeo;
use App\Models\Campanias\Campania;
use App\Models\Campanias\TipoCampania;
use App\Models\Contactos\Segmento;
use App\Models\Formaciones\Formacion;
use App\Models\Formaciones\PeriodoAcademico;
use Faker\Generator as Faker;

$factory->define(Campania::class, function (Faker $faker) {
    $periodo=factory(PeriodoAcademico::class)->create();
    $formacion=factory(Formacion::class)->create();
    return [
        'tipo_campania_id' => $faker->numberBetween(1,TipoCampania::count()),
        'nombre' => $faker->realText(150),
        'periodo_academico_id' => $periodo,
        'equipo_mercadeo_id' => $faker->numberBetween(1,EquipoMercadeo::count()),
        'fecha_inicio' => $periodo->fecha_inicio,
        'fecha_final' => $periodo->fin,
        'descripcion' => $faker->realText(255),
        'inversion' => $faker->randomNumber,
        'nivel_formacion_id' => $formacion->nivelFormacion->id,
        'nivel_academico_id' => $formacion->nivelFormacion->nivelAcademico->id,
        'facultad_id' => $formacion->facultad->id,
        'segmento_id' => $faker->numberBetween(1,Segmento::count()),
        'activa' => $faker->boolean
    ];
});
