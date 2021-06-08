<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use App\Models\Campanias\Campania;
use App\Models\Campanias\CategoriaOportunidad;
use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\JustificacionEstadoCampania;
use App\Models\Campanias\Oportunidad;
use App\Models\Contactos\Contacto;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(Oportunidad::class, function (Faker $faker) {

    return [
        'campania_id' => function () {
            return factory(Campania::class)->create()->id;
        },
        'contacto_id' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'formacion_id' => function () {
            return factory(Formacion::class)->create()->id;
        },
        'responsable_id' => function () {
            return factory(User::class)->create()->id;
        },
        'estado_campania_id' => function () {
            return factory(EstadoCampania::class)->create()->id;
        },
        'justificacion_estado_campania_id' => function () {
            return factory(JustificacionEstadoCampania::class)->create()->id;
        },
        'interes' => $faker->optional()->numberBetween(1,5),
        'capacidad' => $faker->optional()->numberBetween(1,5),
        'categoria_oportunidad_id' => function () {
            return factory(CategoriaOportunidad::class)->create()->id;
        },
        'ingreso_recibido' => $faker->randomNumber,
        'ingreso_proyectado' => $faker->randomNumber,
        'adicion_manual' => $faker->boolean,
        'ultima_actualizacion' => $faker->date('Y-m-d H:i:s'),
        'ultima_interaccion' => $faker->date('Y-m-d H:i:s')
    ];
});
