<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\Parentesco;
use App\Models\Parametros\TipoParentesco;
use Faker\Generator as Faker;

$factory->define(Parentesco::class, function (Faker $faker) {

    return [
        'contacto_origen' => $faker->numberBetween(1,Contacto::count()),
        'contacto_destino' => $faker->numberBetween(1,Contacto::count()),
        'tipo_parentesco_id' => $faker->numberBetween(1,TipoParentesco::count()),
        'acudiente' => $faker->boolean
    ];
});
