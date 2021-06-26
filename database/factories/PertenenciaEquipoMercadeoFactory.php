<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\EquipoMercadeo;
use App\Models\Admin\PertenenciaEquipoMercadeo;
use App\Models\Admin\User;
use Faker\Generator as Faker;

$factory->define(PertenenciaEquipoMercadeo::class, function (Faker $faker) {

    return [
        'users_id' => $faker->numberBetween(1,User::count()),
        'equipo_mercadeo_id' => $faker->numberBetween(1,EquipoMercadeo::count()),
        'es_lider' => $faker->boolean
    ];
});
