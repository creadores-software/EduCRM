<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\PertenenciaEquipoMercadeo;
use Faker\Generator as Faker;

$factory->define(PertenenciaEquipoMercadeo::class, function (Faker $faker) {

    return [
        'users_id' => $faker->word,
        'equipo_mercadeo_id' => $faker->randomDigitNotNull,
        'es_lider' => $faker->word
    ];
});
