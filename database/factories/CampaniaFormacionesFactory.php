<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\Campania;
use App\Models\Campanias\CampaniaFormaciones;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(CampaniaFormaciones::class, function (Faker $faker) {

    return [
        'campania_id' => $faker->numberBetween(1,Campania::count()),
        'formacion_id' => $faker->numberBetween(1,Formacion::count()),
    ];
});
