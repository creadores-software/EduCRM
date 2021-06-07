<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\ActividadEconomica;
use App\Models\Entidades\CategoriaActividadEconomica;
use Faker\Generator as Faker;

$factory->define(ActividadEconomica::class, function (Faker $faker) {

    return [
        'categoria_actividad_economica_id' =>  function () {
            return factory(CategoriaActividadEconomica::class)->create()->id;
        },
        'nombre' => $faker->unique()->realText(150),
        'es_ies' => $faker->boolean,
        'es_colegio' => $faker->boolean
    ];
});
