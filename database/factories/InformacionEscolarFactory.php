<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionEscolar;
use App\Models\Entidades\Entidad;
use App\Models\Formaciones\NivelFormacion;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(InformacionEscolar::class, function (Faker $faker) {
    $inicio=Carbon::createFromTimeStamp($faker->dateTimeBetween('-10 years', '-1 years')->getTimestamp());
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMonths($faker->numberBetween(5,24));
    $icfes=Carbon::createFromFormat('Y-m-d H:i:s', $fin)->subMonths(2);
    return [
        'contacto_id' => $faker->numberBetween(1,2),
        'entidad_id' => $faker->numberBetween(1,Entidad::count()),
        'nivel_formacion_id' => $faker->numberBetween(1,NivelFormacion::count()),
        'fecha_inicio' => $inicio->format('Y-m-d'),
        'fecha_grado' => $fin->format('Y-m-d'),
        'fecha_icfes' => $icfes->format('Y-m-d'),
        'puntaje_icfes' => $faker->optional()->randomNumber,
        'finalizado' => $faker->boolean,
        'grado' => $faker->optional()->randomDigit
    ];
});
