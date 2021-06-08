<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\EquipoMercadeo;
use App\Models\Admin\PertenenciaEquipoMercadeo;
use App\Models\Admin\User;
use Faker\Generator as Faker;

$factory->define(PertenenciaEquipoMercadeo::class, function (Faker $faker) {

    return [
        'users_id' => function () {
            return factory(User::class)->create()->id;
        },
        'equipo_mercadeo_id' => function () {
            return factory(EquipoMercadeo::class)->create()->id;
        },
        'es_lider' => $faker->boolean
    ];
});
