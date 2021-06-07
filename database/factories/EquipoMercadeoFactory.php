<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\EquipoMercadeo;
use Faker\Generator as Faker;

$factory->define(EquipoMercadeo::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
