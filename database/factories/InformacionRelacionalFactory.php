<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Entidades\Ocupacion;
use App\Models\Formaciones\NivelFormacion;
use App\Models\Parametros\ActitudServicio;
use App\Models\Parametros\Beneficio;
use App\Models\Parametros\EstadoDisposicion;
use App\Models\Parametros\EstatusLealtad;
use App\Models\Parametros\EstatusUsuario;
use App\Models\Parametros\EstiloVida;
use App\Models\Parametros\FrecuenciaUso;
use App\Models\Parametros\Generacion;
use App\Models\Parametros\Personalidad;
use App\Models\Parametros\Raza;
use App\Models\Parametros\Religion;
use Faker\Generator as Faker;

$factory->define(InformacionRelacional::class, function (Faker $faker) {

    return [
        'maximo_nivel_formacion_id' => function () {
            return factory(NivelFormacion::class)->create()->id;
        },
        'ocupacion_actual_id' => function () {
            return factory(Ocupacion::class)->create()->id;
        },
        'estilo_vida_id' => function () {
            return factory(EstiloVida::class)->create()->id;
        },
        'religion_id' => function () {
            return factory(Religion::class)->create()->id;
        },
        'raza_id' => function () {
            return factory(Raza::class)->create()->id;
        },
        'generacion_id' => function () {
            return factory(Generacion::class)->create()->id;
        },
        'personalidad_id' => function () {
            return factory(Personalidad::class)->create()->id;
        },
        'beneficio_id' => function () {
            return factory(Beneficio::class)->create()->id;
        },
        'frecuencia_uso_id' => function () {
            return factory(FrecuenciaUso::class)->create()->id;
        },
        'estatus_usuario_id' => function () {
            return factory(EstatusUsuario::class)->create()->id;
        },
        'estatus_lealtad_id' => function () {
            return factory(EstatusLealtad::class)->create()->id;
        },
        'estado_disposicion_id' => function () {
            return factory(EstadoDisposicion::class)->create()->id;
        },
        'actitud_servicio_id' =>function () {
            return factory(ActitudServicio::class)->create()->id;
        },
        'autoriza_comunicacion' => $faker->boolean
    ];
});
