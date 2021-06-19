<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionLaboral;
use App\Models\Entidades\Entidad;
use App\Models\Entidades\Ocupacion;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(InformacionLaboral::class, function (Faker $faker) {
    $inicio=Carbon::createFromTimeStamp($faker->dateTimeBetween('-10 years', '-1 years')->getTimestamp());
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMonths($faker->numberBetween(1,60));
    return [
        'contacto_id' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'entidad_id' => function () {
            return factory(Entidad::class)->create()->id;
        },
        'ocupacion_id' => function () {
            return factory(Ocupacion::class)->create()->id;
        },
        'area' => $faker->realText(45),
        'funciones' => $faker->realText(255),
        'telefono' => $faker->e164PhoneNumber,
        'fecha_inicio' => $inicio->format('Y-m-d'),
        'fecha_fin' => $fin->format('Y-m-d'),
        'vinculado_actualmente' => $faker->boolean
    ];
});