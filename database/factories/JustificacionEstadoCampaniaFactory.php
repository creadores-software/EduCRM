<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\JustificacionEstadoCampania;
use Faker\Generator as Faker;

$factory->define(JustificacionEstadoCampania::class, function (Faker $faker) {

    return [
        'estado_campania_id' => $faker->numberBetween(1,EstadoCampania::count()),
        'nombre' => $faker->unique()->realText(45)
    ];
});
