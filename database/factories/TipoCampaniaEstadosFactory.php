<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\TipoCampania;
use App\Models\Campanias\TipoCampaniaEstados;
use Faker\Generator as Faker;

$factory->define(TipoCampaniaEstados::class, function (Faker $faker) {

    return [
        'tipo_campania_id' => function () {
            return factory(TipoCampania::class)->create()->id;
        },
        'estado_campania_id' => function () {
            return factory(EstadoCampania::class)->create()->id;
        },
        //Teniendo en cuenta que cada relación será nueva se deja solo 1
        'orden' => 1,
        'dias_cambio' => $faker->randomDigit
    ];
});
