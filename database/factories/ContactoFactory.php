<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionRelacional;
use App\Models\Parametros\EstadoCivil;
use App\Models\Parametros\Lugar;
use App\Models\Parametros\Origen;
use App\Models\Parametros\Prefijo;
use App\Models\Parametros\Sisben;
use App\Models\Parametros\TipoDocumento;
use Faker\Generator as Faker;

$factory->define(Contacto::class, function (Faker $faker) {

    $prefijo = factory(Prefijo::class)->create();
    return [
        'tipo_documento_id' => function () {
            return factory(TipoDocumento::class)->create()->id;
        },
        'identificacion' => $faker->unique()->numerify('############'),
        'prefijo_id' => $prefijo->id,
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'fecha_nacimiento' => $faker->optional()->date('Y-m-d','now'),
        'genero_id' => $prefijo->genero->id,
        'estado_civil_id' => function () {
            return factory(EstadoCivil::class)->create()->id;
        },
        'celular' => $faker->e164PhoneNumber,
        'telefono' => $faker->optional()->e164PhoneNumber,
        'correo_personal' => $faker->freeEmail,
        'correo_institucional' => $faker->optional()->companyEmail,
        'lugar_residencia' => function () {
            return factory(Lugar::class)->create()->id;
        },
        'direccion_residencia' => $faker->optional()->address,
        'barrio' => $faker->optional()->streetName,
        'estrato' => $faker->optional()->numberBetween(1,6),
        'sisben_id' => function () {
            return factory(Sisben::class)->create()->id;
        },
        'observacion' => $faker->text,
        'referido_por' => null,
        'origen_id' =>function () {
            return factory(Origen::class)->create()->id;
        },
        'otro_origen' => null,
        'activo' => $faker->boolean,
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
    ];
});
