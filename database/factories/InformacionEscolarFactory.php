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
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMonths($faker->numberBetween(1,24));
    $icfes=Carbon::createFromFormat('Y-m-d H:i:s', $fin)->subMonths(2);
    return [
        'contacto_id' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'entidad_id' => function () {
            return factory(Entidad::class)->create()->id;
        },
        'nivel_formacion_id' => function () {
            return factory(NivelFormacion::class)->create()->id;
        },
        'fecha_inicio' => $inicio->format('Y-m-d'),
        'fecha_grado' => $fin->format('Y-m-d'),
        'fecha_icfes' => $icfes->format('Y-m-d'),
        'puntaje_icfes' => $faker->optional()->randomNumber,
        'finalizado' => $faker->boolean,
        'grado' => $faker->optional()->randomDigit
    ];
});
