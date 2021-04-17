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
                'name' => 'admin.perimissions.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin.perimissions.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admin.perimissions.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admin.perimissions.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admin.roles.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'admin.roles.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'admin.roles.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'admin.roles.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'admin.users.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'admin.users.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'admin.users.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'admin.users.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'contactos.contactos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'contactos.contactos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'contactos.contactos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'contactos.contactos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'contactos.contactos.importar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'contactos.informacionesEscolares.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'contactos.informacionesEscolares.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'contactos.informacionesEscolares.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'contactos.informacionesEscolares.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'contactos.informacionesLaborales.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'contactos.informacionesLaborales.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'contactos.informacionesLaborales.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'contactos.informacionesLaborales.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'contactos.informacionesRelacionales.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'contactos.informacionesRelacionales.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'contactos.informacionesRelacionales.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'contactos.informacionesRelacionales.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'contactos.informacionesUniversitarias.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'contactos.informacionesUniversitarias.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'contactos.informacionesUniversitarias.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'contactos.informacionesUniversitarias.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'contactos.parentescos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'contactos.parentescos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'contactos.parentescos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'contactos.parentescos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'contactos.segmentos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'contactos.segmentos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'contactos.segmentos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'contactos.segmentos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'entidades.actividadesEconomicas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'entidades.actividadesEconomicas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'entidades.actividadesEconomicas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'entidades.actividadesEconomicas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'entidades.categoriasActividadEconomica.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'entidades.categoriasActividadEconomica.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'entidades.categoriasActividadEconomica.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'entidades.categoriasActividadEconomica.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'entidades.entidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'entidades.entidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'entidades.entidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'entidades.entidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'entidades.ocupaciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'entidades.ocupaciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'entidades.ocupaciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'entidades.ocupaciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'entidades.sectores.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'entidades.sectores.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'entidades.sectores.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'entidades.sectores.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'entidades.tiposOcupacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'entidades.tiposOcupacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'entidades.tiposOcupacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'entidades.tiposOcupacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'formaciones.camposEducacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'formaciones.camposEducacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'formaciones.camposEducacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'formaciones.camposEducacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'formaciones.categoriasCampoEducacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'formaciones.categoriasCampoEducacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'formaciones.categoriasCampoEducacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'formaciones.categoriasCampoEducacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'formaciones.facultades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'formaciones.facultades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'formaciones.facultades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'formaciones.facultades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'formaciones.formaciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'formaciones.formaciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'formaciones.formaciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'formaciones.formaciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'formaciones.modalidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'formaciones.modalidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'formaciones.modalidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'formaciones.modalidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'formaciones.nivelesAcademicos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'formaciones.nivelesAcademicos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'formaciones.nivelesAcademicos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'formaciones.nivelesAcademicos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'formaciones.nivelesFormacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'formaciones.nivelesFormacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'formaciones.nivelesFormacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'formaciones.nivelesFormacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'formaciones.periodicidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'formaciones.periodicidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'formaciones.periodicidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'formaciones.periodicidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'formaciones.reconocimientos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'formaciones.reconocimientos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'formaciones.reconocimientos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'formaciones.reconocimientos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'formaciones.tiposAcceso.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'formaciones.tiposAcceso.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'formaciones.tiposAcceso.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'formaciones.tiposAcceso.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'parametros.actitudesServicio.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'parametros.actitudesServicio.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'parametros.actitudesServicio.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'parametros.actitudesServicio.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'parametros.actividadesOcio.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'parametros.actividadesOcio.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'parametros.actividadesOcio.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'parametros.actividadesOcio.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'parametros.beneficios.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'parametros.beneficios.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'parametros.beneficios.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'parametros.beneficios.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'parametros.buyerPersonas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'parametros.buyerPersonas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'parametros.buyerPersonas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'parametros.buyerPersonas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'parametros.estadosCiviles.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'parametros.estadosCiviles.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'parametros.estadosCiviles.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'parametros.estadosCiviles.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'parametros.estadosDisposicion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'parametros.estadosDisposicion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'parametros.estadosDisposicion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'parametros.estadosDisposicion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'parametros.estatusLealtad.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'parametros.estatusLealtad.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'parametros.estatusLealtad.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'parametros.estatusLealtad.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'parametros.estatusUsuario.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'parametros.estatusUsuario.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'parametros.estatusUsuario.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'parametros.estatusUsuario.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'parametros.estilosVida.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'parametros.estilosVida.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'parametros.estilosVida.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'parametros.estilosVida.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'parametros.frecuenciasUso.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'parametros.frecuenciasUso.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'parametros.frecuenciasUso.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'parametros.frecuenciasUso.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'parametros.generaciones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'parametros.generaciones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'parametros.generaciones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'parametros.generaciones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'parametros.generos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'parametros.generos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'parametros.generos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'parametros.generos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'parametros.lugares.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'parametros.lugares.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'parametros.lugares.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'parametros.lugares.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'parametros.mediosComunicacion.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'parametros.mediosComunicacion.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'parametros.mediosComunicacion.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'parametros.mediosComunicacion.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'parametros.origenes.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'parametros.origenes.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'parametros.origenes.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'parametros.origenes.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'parametros.personalidades.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'parametros.personalidades.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'parametros.personalidades.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'parametros.personalidades.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'parametros.prefijos.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'parametros.prefijos.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'parametros.prefijos.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'parametros.prefijos.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'parametros.razas.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'parametros.razas.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'parametros.razas.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'parametros.razas.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'parametros.religiones.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'parametros.religiones.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'parametros.religiones.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'parametros.religiones.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'parametros.tiposContacto.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'parametros.tiposContacto.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'parametros.tiposContacto.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'parametros.tiposContacto.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'parametros.tiposDocumento.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'parametros.tiposDocumento.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'parametros.tiposDocumento.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'parametros.tiposDocumento.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'parametros.tiposParentesco.consultar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'parametros.tiposParentesco.crear',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'parametros.tiposParentesco.editar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'parametros.tiposParentesco.eliminar',
                'guard_name' => 'web',
                'created_at' => '2021-04-16 23:47:16',
                'updated_at' => '2021-04-16 23:47:16',
            ),
        ));
        
        
    }
}