<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\CampaniaFormaciones;
use Faker\Generator as Faker;

$factory->define(CampaniaFormaciones::class, function (Faker $faker) {

    return [
        'campania_id' => $faker->randomDigitNotNull,
        'formacion_id' => $faker->randomDigitNotNull
    ];
});
