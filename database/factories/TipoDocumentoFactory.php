<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\TipoDocumento;
use Faker\Generator as Faker;

$factory->define(TipoDocumento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word(45),
        'abreviacion' => strtoupper($faker->lexify('??'))
    ];
});
