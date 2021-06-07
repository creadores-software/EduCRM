<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use Faker\Generator as Faker;

$factory->define(Contacto::class, function (Faker $faker) {

    return [
        'tipo_documento_id' => $faker->randomDigitNotNull,
        'identificacion' => $faker->word,
        'prefijo_id' => $faker->randomDigitNotNull,
        'nombres' => $faker->word,
        'apellidos' => $faker->word,
        'fecha_nacimiento' => $faker->word,
        'genero_id' => $faker->randomDigitNotNull,
        'estado_civil_id' => $faker->randomDigitNotNull,
        'celular' => $faker->word,
        'telefono' => $faker->word,
        'correo_personal' => $faker->word,
        'correo_institucional' => $faker->word,
        'lugar_residencia' => $faker->randomDigitNotNull,
        'direccion_residencia' => $faker->word,
        'barrio' => $faker->word,
        'estrato' => $faker->randomDigitNotNull,
        'sisben_id' => $faker->randomDigitNotNull,
        'observacion' => $faker->word,
        'referido_por' => $faker->randomDigitNotNull,
        'origen_id' => $faker->randomDigitNotNull,
        'otro_origen' => $faker->word,
        'activo' => $faker->word,
        'informacion_relacional_id' => $faker->randomDigitNotNull
    ];
});
