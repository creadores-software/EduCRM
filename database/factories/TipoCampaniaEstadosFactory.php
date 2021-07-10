<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\TipoCampania;
use App\Models\Campanias\TipoCampaniaEstados;
use Faker\Generator as Faker;

$factory->define(TipoCampaniaEstados::class, function (Faker $faker) {

    return [
        'tipo_campania_id' => $faker->numberBetween(1,TipoCampania::count()),
        'estado_campania_id' => $faker->numberBetween(1,EstadoCampania::count()),
        //Teniendo en cuenta que cada relación será nueva se deja solo 1
        'orden' => TipoCampaniaEstados::count(),
        'dias_cambio' => $faker->randomDigit
    ];
});
