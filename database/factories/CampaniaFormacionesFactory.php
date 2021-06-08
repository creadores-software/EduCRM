<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\Campania;
use App\Models\Campanias\CampaniaFormaciones;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(CampaniaFormaciones::class, function (Faker $faker) {

    return [
        'campania_id' => function () {
            return factory(Campania::class)->create()->id;
        },
        'formacion_id' => function () {
            return factory(Formacion::class)->create()->id;
        },
    ];
});
