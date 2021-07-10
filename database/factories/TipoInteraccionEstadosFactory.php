<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoInteraccion;
use App\Models\Campanias\TipoInteraccion;
use App\Models\Campanias\TipoInteraccionEstados;
use Faker\Generator as Faker;

$factory->define(TipoInteraccionEstados::class, function (Faker $faker) {

    return [
        'tipo_interaccion_id' => $faker->numberBetween(1,TipoInteraccion::count()),
        'estado_interaccion_id' => $faker->numberBetween(1,EstadoInteraccion::count()),
    ];
});
