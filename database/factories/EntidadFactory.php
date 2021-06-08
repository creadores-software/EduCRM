<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\ActividadEconomica;
use App\Models\Entidades\Entidad;
use App\Models\Entidades\Sector;
use App\Models\Parametros\Lugar;
use Faker\Generator as Faker;

$factory->define(Entidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->company,
        'nit' => $faker->numerify('#########'),
        'lugar_id' => function () {
            return factory(Lugar::class)->create()->id;
        },
        'direccion' => $faker->address,
        'barrio' => $faker->streetName,
        'correo' => $faker->email,
        'telefono' => $faker->e164PhoneNumber,
        'sitio_web' => $faker->domainName,
        'sector_id' => function () {
            return factory(Sector::class)->create()->id;
        },
        'actividad_economica_id' => function () {
            return factory(ActividadEconomica::class)->create()->id;
        },
        'codigo_ies' => $faker->numerify('####'),
        'acreditacion_ies' => $faker->boolean,
        'calendario' => null,
        'mi_universidad' => 0
    ];
});
