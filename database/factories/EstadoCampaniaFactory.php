<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\TipoEstadoColor;
use Faker\Generator as Faker;

$factory->define(EstadoCampania::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
        'descripcion' => $faker->realText(255),
        'tipo_estado_color_id' => $faker->numberBetween(1,TipoEstadoColor::count()),
    ];
});
