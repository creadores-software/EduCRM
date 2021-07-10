<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\ActividadEconomica;
use App\Models\Entidades\Entidad;
use App\Models\Entidades\Sector;
use App\Models\Parametros\Lugar;
use Faker\Generator as Faker;

$factory->define(Entidad::class, function (Faker $faker) {
    $lugares = Lugar::pluck('id')->toArray();
    return [
        'nombre' => $faker->company,
        'nit' => $faker->numerify('#########'),
        'lugar_id' => $faker->randomElement($lugares),
        'direccion' => $faker->address,
        'barrio' => $faker->streetName,
        'correo' => $faker->email,
        'telefono' => $faker->e164PhoneNumber,
        'sitio_web' => $faker->domainName,
        'sector_id' => $faker->numberBetween(1,Sector::count()),
        'actividad_economica_id' => $faker->numberBetween(1,ActividadEconomica::count()),
        'codigo_ies' => $faker->numerify('####'),
        'acreditacion_ies' => $faker->boolean,
        'calendario' => null,
        'mi_universidad' => 0
    ];
});
