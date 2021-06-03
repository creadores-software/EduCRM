<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin.equiposMercadeo.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin.equiposMercadeo.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admin.equiposMercadeo.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admin.equiposMercadeo.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admin.permissions.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'admin.permissions.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'admin.permissions.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'admin.permissions.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'admin.pertenenciasEquipoMercadeo.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'admin.pertenenciasEquipoMercadeo.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'admin.pertenenciasEquipoMercadeo.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'admin.pertenenciasEquipoMercadeo.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'admin.roles.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'admin.roles.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'admin.roles.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'admin.roles.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'admin.users.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'admin.users.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'admin.users.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'admin.users.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'campanias.campanias.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'campanias.campanias.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'campanias.campanias.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'campanias.campanias.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'campanias.estadosCampania.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'campanias.estadosCampania.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'campanias.estadosCampania.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'campanias.estadosCampania.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'campanias.estadosInteraccion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'campanias.estadosInteraccion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'campanias.estadosInteraccion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'campanias.estadosInteraccion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'campanias.interacciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'campanias.interacciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'campanias.interacciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'campanias.interacciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'campanias.interacciones.importar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'campanias.justificacionesEstadoCampania.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'campanias.justificacionesEstadoCampania.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'campanias.justificacionesEstadoCampania.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'campanias.justificacionesEstadoCampania.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'campanias.categoriasOportunidad.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'campanias.categoriasOportunidad.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'campanias.categoriasOportunidad.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'campanias.categoriasOportunidad.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'campanias.oportunidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'campanias.oportunidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'campanias.oportunidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'campanias.oportunidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'campanias.oportunidades.importar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'campanias.oportunidades.sincronizar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'campanias.tiposCampania.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'campanias.tiposCampania.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'campanias.tiposCampania.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'campanias.tiposCampania.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'campanias.tiposCampaniaEstados.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'campanias.tiposCampaniaEstados.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'campanias.tiposCampaniaEstados.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'campanias.tiposCampaniaEstados.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'campanias.tiposEstadoColor.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'campanias.tiposEstadoColor.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'campanias.tiposEstadoColor.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'campanias.tiposEstadoColor.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'campanias.tiposInteraccion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'campanias.tiposInteraccion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'campanias.tiposInteraccion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'campanias.tiposInteraccion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'contactos.contactos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'contactos.contactos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'contactos.contactos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'contactos.contactos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'contactos.contactos.importar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'contactos.informacionesEscolares.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'contactos.informacionesEscolares.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'contactos.informacionesEscolares.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'contactos.informacionesEscolares.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'contactos.informacionesLaborales.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'contactos.informacionesLaborales.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'contactos.informacionesLaborales.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'contactos.informacionesLaborales.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'contactos.informacionesRelacionales.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'contactos.informacionesRelacionales.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'contactos.informacionesRelacionales.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'contactos.informacionesRelacionales.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'contactos.informacionesUniversitarias.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'contactos.informacionesUniversitarias.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'contactos.informacionesUniversitarias.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'contactos.informacionesUniversitarias.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'contactos.parentescos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'contactos.parentescos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'contactos.parentescos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'contactos.parentescos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'contactos.segmentos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'contactos.segmentos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'contactos.segmentos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'contactos.segmentos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'entidades.actividadesEconomicas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'entidades.actividadesEconomicas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'entidades.actividadesEconomicas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'entidades.actividadesEconomicas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'entidades.categoriasActividadEconomica.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'entidades.categoriasActividadEconomica.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'entidades.categoriasActividadEconomica.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'entidades.categoriasActividadEconomica.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:51',
                'updated_at' => '2021-06-02 22:25:51',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'entidades.entidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'entidades.entidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'entidades.entidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'entidades.entidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'entidades.ocupaciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'entidades.ocupaciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'entidades.ocupaciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'entidades.ocupaciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'entidades.sectores.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'entidades.sectores.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'entidades.sectores.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'entidades.sectores.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'entidades.tiposOcupacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'entidades.tiposOcupacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'entidades.tiposOcupacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'entidades.tiposOcupacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'formaciones.camposEducacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'formaciones.camposEducacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'formaciones.camposEducacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'formaciones.camposEducacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'formaciones.categoriasCampoEducacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'formaciones.categoriasCampoEducacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'formaciones.categoriasCampoEducacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'formaciones.categoriasCampoEducacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'formaciones.facultades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'formaciones.facultades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'formaciones.facultades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'formaciones.facultades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'formaciones.formaciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'formaciones.formaciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'formaciones.formaciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'formaciones.formaciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'formaciones.jornadas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'formaciones.jornadas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'formaciones.jornadas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'formaciones.jornadas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'formaciones.modalidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'formaciones.modalidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'formaciones.modalidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'formaciones.modalidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'formaciones.nivelesAcademicos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'formaciones.nivelesAcademicos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'formaciones.nivelesAcademicos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'formaciones.nivelesAcademicos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'formaciones.nivelesFormacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'formaciones.nivelesFormacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'formaciones.nivelesFormacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'formaciones.nivelesFormacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'formaciones.periodicidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'formaciones.periodicidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'formaciones.periodicidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'formaciones.periodicidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'formaciones.periodosAcademico.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'formaciones.periodosAcademico.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'formaciones.periodosAcademico.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'formaciones.periodosAcademico.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'formaciones.reconocimientos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'formaciones.reconocimientos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'formaciones.reconocimientos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'formaciones.reconocimientos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'formaciones.tiposAcceso.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'formaciones.tiposAcceso.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'formaciones.tiposAcceso.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'formaciones.tiposAcceso.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'parametros.actitudesServicio.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'parametros.actitudesServicio.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'parametros.actitudesServicio.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'parametros.actitudesServicio.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'parametros.actividadesOcio.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'parametros.actividadesOcio.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'parametros.actividadesOcio.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'parametros.actividadesOcio.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'parametros.beneficios.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'parametros.beneficios.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'parametros.beneficios.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'parametros.beneficios.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'parametros.buyerPersonas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'parametros.buyerPersonas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'parametros.buyerPersonas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'parametros.buyerPersonas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'parametros.estadosCiviles.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'parametros.estadosCiviles.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'parametros.estadosCiviles.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'parametros.estadosCiviles.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'parametros.estadosDisposicion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'parametros.estadosDisposicion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'parametros.estadosDisposicion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'parametros.estadosDisposicion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'parametros.estatusLealtad.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'parametros.estatusLealtad.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'parametros.estatusLealtad.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'parametros.estatusLealtad.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'parametros.estatusUsuario.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'parametros.estatusUsuario.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'parametros.estatusUsuario.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'parametros.estatusUsuario.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'parametros.estilosVida.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'parametros.estilosVida.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'parametros.estilosVida.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'parametros.estilosVida.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'parametros.frecuenciasUso.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'parametros.frecuenciasUso.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'parametros.frecuenciasUso.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'parametros.frecuenciasUso.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'parametros.generaciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'parametros.generaciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'parametros.generaciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'parametros.generaciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'parametros.generos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'parametros.generos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'parametros.generos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'parametros.generos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'parametros.lugares.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'parametros.lugares.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'parametros.lugares.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'parametros.lugares.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'parametros.mediosComunicacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'parametros.mediosComunicacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'parametros.mediosComunicacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'parametros.mediosComunicacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'parametros.origenes.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'parametros.origenes.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'parametros.origenes.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'parametros.origenes.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'parametros.personalidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'parametros.personalidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'parametros.personalidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'parametros.personalidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'parametros.prefijos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'parametros.prefijos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'parametros.prefijos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'parametros.prefijos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'parametros.razas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'parametros.razas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'parametros.razas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'parametros.razas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'parametros.religiones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'parametros.religiones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'parametros.religiones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'parametros.religiones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'parametros.sisbenes.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'parametros.sisbenes.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'parametros.sisbenes.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'parametros.sisbenes.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'parametros.tiposContacto.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'parametros.tiposContacto.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            250 => 
            array (
                'id' => 251,
                'name' => 'parametros.tiposContacto.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'parametros.tiposContacto.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'parametros.tiposDocumento.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            253 => 
            array (
                'id' => 254,
                'name' => 'parametros.tiposDocumento.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'parametros.tiposDocumento.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'parametros.tiposDocumento.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'parametros.tiposParentesco.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'parametros.tiposParentesco.crear',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'parametros.tiposParentesco.editar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'parametros.tiposParentesco.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'reportes.funnel',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'reportes.interacciones',
                'guard_name' => 'web',
                'created_at' => '2021-06-02 22:25:52',
                'updated_at' => '2021-06-02 22:25:52',
            ),
        ));
        
        
    }
}