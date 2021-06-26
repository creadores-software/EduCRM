<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionRelacional;
use App\Models\Parametros\EstadoCivil;
use App\Models\Parametros\Lugar;
use App\Models\Parametros\Prefijo;
use App\Models\Parametros\Sisben;
use App\Models\Parametros\TipoDocumento;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Contacto::class, function (Faker $faker) {

    $prefijo = Prefijo::inRandomOrder()->first();
    $nacimiento=Carbon::createFromTimeStamp($faker->dateTimeBetween('-60 years', '-1 days')->getTimestamp());
    $lugares = Lugar::pluck('id')->toArray();
    return [
        'tipo_documento_id' => $faker->numberBetween(1,TipoDocumento::count()),        
        'identificacion' => $faker->unique()->numerify('############'),
        'prefijo_id' => $prefijo->id,
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'fecha_nacimiento' => $nacimiento->format('Y-m-d'),
        'genero_id' => $prefijo->genero->id,
        'estado_civil_id' => $faker->numberBetween(1,EstadoCivil::count()),
        'celular' => $faker->e164PhoneNumber,
        'telefono' => $faker->optional()->e164PhoneNumber,
        'correo_personal' => $faker->freeEmail,
        'correo_institucional' => $faker->optional()->companyEmail,
        'lugar_residencia' => $faker->randomElement($lugares),
        'direccion_residencia' => $faker->optional()->streetAddress,
        'barrio' => $faker->realText(50),
        'estrato' => $faker->numberBetween(1,6),
        'sisben_id' => $faker->numberBetween(1,Sisben::count()),
        'observacion' => $faker->realText(255),
        'referido_por' => null,
        'origen_id' =>$faker->numberBetween(1,5), //No se tienen en cuenta referidos y parientes
        'otro_origen' => null,
        'activo' => $faker->boolean,
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
    ];
});
