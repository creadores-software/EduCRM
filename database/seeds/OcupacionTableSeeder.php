<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class OcupacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('ocupacion')->delete();
        
        DB::table('ocupacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Miembros del Poder Ejecutivo y Legislativo',
                'tipo_ocupacion_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Personal Directivo de la Administración Pública',
                'tipo_ocupacion_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Directores y Gerentes Generales de Servicios Financieros, de Telecomunicaciones y Otros Servicios a las Empresas',
                'tipo_ocupacion_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Directores y Gerentes Generales de Salud, Educación, Servicios Social, Comunitario y Organizaciones de Membresía',
                'tipo_ocupacion_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Directores y Gerentes Generales de Comercio, Medios de Comunicación y Otros Servicios',
                'tipo_ocupacion_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Directores y Gerentes Generales de Producción de Bienes, Servicios Públicos, Transporte y Construcción',
                'tipo_ocupacion_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Directores y gerentes generales de servicios y procesos de negocio.',
                'tipo_ocupacion_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Gerentes Financieros',
                'tipo_ocupacion_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Gerentes de Talento Humano',
                'tipo_ocupacion_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Gerentes de Compras y Adquisiciones',
                'tipo_ocupacion_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Gerentes de Otros Servicios Administrativos',
                'tipo_ocupacion_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Gerentes de Seguros, Bienes Raíces y Corretaje Financiero',
                'tipo_ocupacion_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Gerentes de Banca, Crédito e Inversiones',
                'tipo_ocupacion_id' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Gerentes de Otros Servicios a las Empresas',
                'tipo_ocupacion_id' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'Gerentes de Empresas de Telecomunicaciones',
                'tipo_ocupacion_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'nombre' => 'Gerentes de Servicios de Correo y Mensajería',
                'tipo_ocupacion_id' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'nombre' => 'Gerentes de Ingeniería',
                'tipo_ocupacion_id' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'nombre' => 'Gerentes de Investigación y Desarrollo en Ciencias Naturales y Aplicadas',
                'tipo_ocupacion_id' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'nombre' => 'Gerentes de Sistemas de Información y Procesamiento de Datos',
                'tipo_ocupacion_id' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'nombre' => 'Gerentes de Servicios a la Salud',
                'tipo_ocupacion_id' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'nombre' => 'Gerentes de Programas de Política Social y de Salud',
                'tipo_ocupacion_id' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'nombre' => 'Gerentes de Programas de Política de Desarrollo Económico',
                'tipo_ocupacion_id' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'nombre' => 'Gerentes de Programas de Política Educativa',
                'tipo_ocupacion_id' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'nombre' => 'Otros Gerentes de Administración Pública',
                'tipo_ocupacion_id' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'nombre' => 'Administradores de Educación Superior y Formación para el Trabajo',
                'tipo_ocupacion_id' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'nombre' => 'Directores y Administradores de Educación Básica y Media',
                'tipo_ocupacion_id' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'nombre' => 'Gerentes de Servicios Social, Comunitario y Correccional',
                'tipo_ocupacion_id' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'nombre' => 'Gerentes de Biblioteca, Museo y Galería de Arte',
                'tipo_ocupacion_id' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'nombre' => 'Gerentes de Medios de Comunicación y Artes Escénicas',
                'tipo_ocupacion_id' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'nombre' => 'Directores de Programas de Esparcimiento y Administradores de Deportes',
                'tipo_ocupacion_id' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'nombre' => 'Gerentes de Ventas, Mercadeo y Publicidad',
                'tipo_ocupacion_id' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'nombre' => 'Gerentes de Comercio Exterior',
                'tipo_ocupacion_id' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'nombre' => 'Gerentes de Comercio al Por Menor',
                'tipo_ocupacion_id' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'nombre' => 'Gerentes de Restaurantes y Servicios de Alimentos',
                'tipo_ocupacion_id' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'nombre' => 'Gerentes de Servicios Hoteleros',
                'tipo_ocupacion_id' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'nombre' => 'Oficiales de las Fuerzas Militares',
                'tipo_ocupacion_id' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'nombre' => 'Oficiales de Policía',
                'tipo_ocupacion_id' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'nombre' => 'Oficiales de Bomberos',
                'tipo_ocupacion_id' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'nombre' => 'Oficiales del Cuerpo de Custodia y Vigilancia',
                'tipo_ocupacion_id' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'nombre' => 'Gerentes de Otros Servicios',
                'tipo_ocupacion_id' => 1,
            ),
            40 => 
            array (
                'id' => 41,
            'nombre' => 'Gerentes de Producción Primaria (excepto agricultura)',
                'tipo_ocupacion_id' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'nombre' => 'Gerentes de Producción Agrícola, Pecuaria, Acuícola y Pesquero',
                'tipo_ocupacion_id' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'nombre' => 'Gerentes de Construcción',
                'tipo_ocupacion_id' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'nombre' => 'Gerentes de Transporte y Distribución',
                'tipo_ocupacion_id' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'nombre' => 'Gerentes de Logística',
                'tipo_ocupacion_id' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'nombre' => 'Gerentes Cadena de Suministro',
                'tipo_ocupacion_id' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'nombre' => 'Gerentes de Operación de Instalaciones Físicas',
                'tipo_ocupacion_id' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'nombre' => 'Gerentes de Mantenimiento',
                'tipo_ocupacion_id' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'nombre' => 'Gerentes de Producción Industrial',
                'tipo_ocupacion_id' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'nombre' => 'Gerentes de Empresas de Servicios Públicos',
                'tipo_ocupacion_id' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'nombre' => 'Contadores',
                'tipo_ocupacion_id' => 2,
            ),
            51 => 
            array (
                'id' => 52,
                'nombre' => 'Analistas, Asesores y Agentes de Mercado Financiero',
                'tipo_ocupacion_id' => 2,
            ),
            52 => 
            array (
                'id' => 53,
                'nombre' => 'Auditores Financieros y Contables',
                'tipo_ocupacion_id' => 2,
            ),
            53 => 
            array (
                'id' => 54,
                'nombre' => 'Profesionales de Talento Humano',
                'tipo_ocupacion_id' => 2,
            ),
            54 => 
            array (
                'id' => 55,
                'nombre' => 'Profesionales en Organización y Administración de las Empresas',
                'tipo_ocupacion_id' => 2,
            ),
            55 => 
            array (
                'id' => 56,
                'nombre' => 'Evaluadores de Competencias Laborales',
                'tipo_ocupacion_id' => 2,
            ),
            56 => 
            array (
                'id' => 57,
                'nombre' => 'Archivistas',
                'tipo_ocupacion_id' => 2,
            ),
            57 => 
            array (
                'id' => 58,
                'nombre' => 'Supervisores de Empleados de Apoyo Administrativo',
                'tipo_ocupacion_id' => 2,
            ),
            58 => 
            array (
                'id' => 59,
                'nombre' => 'Jefes y supervisores de entidades financieras',
                'tipo_ocupacion_id' => 2,
            ),
            59 => 
            array (
                'id' => 60,
                'nombre' => 'Supervisores y coordinadores de procesos de negocio, Empleados de información y servicio al cliente',
                'tipo_ocupacion_id' => 2,
            ),
            60 => 
            array (
                'id' => 61,
                'nombre' => 'Supervisores de Empleados de Correo y Mensajería',
                'tipo_ocupacion_id' => 2,
            ),
            61 => 
            array (
                'id' => 62,
                'nombre' => 'Supervisores de Almacenamiento, Inventario y Distribución',
                'tipo_ocupacion_id' => 2,
            ),
            62 => 
            array (
                'id' => 63,
                'nombre' => 'Asistentes Administrativos',
                'tipo_ocupacion_id' => 2,
            ),
            63 => 
            array (
                'id' => 64,
                'nombre' => 'Administradores de Propiedad Horizontal',
                'tipo_ocupacion_id' => 2,
            ),
            64 => 
            array (
                'id' => 65,
                'nombre' => 'Asistentes de Talento Humano',
                'tipo_ocupacion_id' => 2,
            ),
            65 => 
            array (
                'id' => 66,
                'nombre' => 'Asistentes de compras',
                'tipo_ocupacion_id' => 2,
            ),
            66 => 
            array (
                'id' => 67,
                'nombre' => 'Asistentes de Juzgados, Tribunales y Afines',
                'tipo_ocupacion_id' => 2,
            ),
            67 => 
            array (
                'id' => 68,
                'nombre' => 'Funcionarios de Aduanas, Impuestos, Inmigración y Seguridad Social',
                'tipo_ocupacion_id' => 2,
            ),
            68 => 
            array (
                'id' => 69,
                'nombre' => 'Asistentes de Comercio Exterior',
                'tipo_ocupacion_id' => 2,
            ),
            69 => 
            array (
                'id' => 70,
                'nombre' => 'Técnicos en Archivística',
                'tipo_ocupacion_id' => 2,
            ),
            70 => 
            array (
                'id' => 71,
                'nombre' => 'Asistentes Contables',
                'tipo_ocupacion_id' => 2,
            ),
            71 => 
            array (
                'id' => 72,
                'nombre' => 'Analistas, Asistentes y Asesores de Servicios Financieros',
                'tipo_ocupacion_id' => 2,
            ),
            72 => 
            array (
                'id' => 73,
                'nombre' => 'Evaluadores, Ajustadores, Analistas y Liquidadores de Seguros',
                'tipo_ocupacion_id' => 2,
            ),
            73 => 
            array (
                'id' => 74,
                'nombre' => 'Agentes de Aduana',
                'tipo_ocupacion_id' => 2,
            ),
            74 => 
            array (
                'id' => 75,
                'nombre' => 'Asistentes Financieros',
                'tipo_ocupacion_id' => 2,
            ),
            75 => 
            array (
                'id' => 76,
                'nombre' => 'Asistentes Tesorería',
                'tipo_ocupacion_id' => 2,
            ),
            76 => 
            array (
                'id' => 77,
                'nombre' => 'Asistentes de Mercadeo, Publicidad y Comunicaciones',
                'tipo_ocupacion_id' => 2,
            ),
            77 => 
            array (
                'id' => 78,
                'nombre' => 'Secretarios',
                'tipo_ocupacion_id' => 2,
            ),
            78 => 
            array (
                'id' => 79,
                'nombre' => 'Recepcionistas y Operadores de Conmutador',
                'tipo_ocupacion_id' => 2,
            ),
            79 => 
            array (
                'id' => 80,
                'nombre' => 'Digitadores',
                'tipo_ocupacion_id' => 2,
            ),
            80 => 
            array (
                'id' => 81,
                'nombre' => 'Transcriptores y Relatores',
                'tipo_ocupacion_id' => 2,
            ),
            81 => 
            array (
                'id' => 82,
                'nombre' => 'Digitalizadores',
                'tipo_ocupacion_id' => 2,
            ),
            82 => 
            array (
                'id' => 83,
                'nombre' => 'Auxiliares Contables, de Tesorería y Financieros',
                'tipo_ocupacion_id' => 2,
            ),
            83 => 
            array (
                'id' => 84,
                'nombre' => 'Cajeros de Servicios Financieros',
                'tipo_ocupacion_id' => 2,
            ),
            84 => 
            array (
                'id' => 85,
                'nombre' => 'Auxiliares de servicios financieros',
                'tipo_ocupacion_id' => 2,
            ),
            85 => 
            array (
                'id' => 86,
                'nombre' => 'Auxiliares de Cartera y Cobranzas',
                'tipo_ocupacion_id' => 2,
            ),
            86 => 
            array (
                'id' => 87,
                'nombre' => 'Auxiliares de Nómina y Prestaciones',
                'tipo_ocupacion_id' => 2,
            ),
            87 => 
            array (
                'id' => 88,
                'nombre' => 'Avaluadores',
                'tipo_ocupacion_id' => 2,
            ),
            88 => 
            array (
                'id' => 89,
                'nombre' => 'Auxiliares Administrativos',
                'tipo_ocupacion_id' => 2,
            ),
            89 => 
            array (
                'id' => 90,
                'nombre' => 'Auxiliares de Talento Humano',
                'tipo_ocupacion_id' => 2,
            ),
            90 => 
            array (
                'id' => 91,
                'nombre' => 'Auxiliares de Tribunales',
                'tipo_ocupacion_id' => 2,
            ),
            91 => 
            array (
                'id' => 92,
                'nombre' => 'Auxiliares de Archivo y Registro',
                'tipo_ocupacion_id' => 2,
            ),
            92 => 
            array (
                'id' => 93,
                'nombre' => 'Auxiliares Administrativos en Salud',
                'tipo_ocupacion_id' => 2,
            ),
            93 => 
            array (
                'id' => 94,
                'nombre' => 'Auxiliares de aduana',
                'tipo_ocupacion_id' => 2,
            ),
            94 => 
            array (
                'id' => 95,
                'nombre' => 'Auxiliares de Biblioteca',
                'tipo_ocupacion_id' => 2,
            ),
            95 => 
            array (
                'id' => 96,
                'nombre' => 'Auxiliares de Publicación y Afines',
                'tipo_ocupacion_id' => 2,
            ),
            96 => 
            array (
                'id' => 97,
                'nombre' => 'Auxiliares de Información y Servicio al Cliente',
                'tipo_ocupacion_id' => 2,
            ),
            97 => 
            array (
                'id' => 98,
                'nombre' => 'Auxiliares de Estadística y Encuestadores',
                'tipo_ocupacion_id' => 2,
            ),
            98 => 
            array (
                'id' => 99,
                'nombre' => 'Auxiliares de Correo y Servicio Postal',
                'tipo_ocupacion_id' => 2,
            ),
            99 => 
            array (
                'id' => 100,
                'nombre' => 'Carteros y Mensajeros',
                'tipo_ocupacion_id' => 2,
            ),
            100 => 
            array (
                'id' => 101,
                'nombre' => 'Auxiliares de Almacén',
                'tipo_ocupacion_id' => 2,
            ),
            101 => 
            array (
                'id' => 102,
                'nombre' => 'Auxiliares de Compras e Inventarios',
                'tipo_ocupacion_id' => 2,
            ),
            102 => 
            array (
                'id' => 103,
                'nombre' => 'Operadores de Radio y Despachadores',
                'tipo_ocupacion_id' => 2,
            ),
            103 => 
            array (
                'id' => 104,
                'nombre' => 'Programadores de Rutas y Tripulaciones',
                'tipo_ocupacion_id' => 2,
            ),
            104 => 
            array (
                'id' => 105,
                'nombre' => 'Operadores Telefónicos',
                'tipo_ocupacion_id' => 2,
            ),
            105 => 
            array (
                'id' => 106,
                'nombre' => 'Físicos y Astrónomos',
                'tipo_ocupacion_id' => 3,
            ),
            106 => 
            array (
                'id' => 107,
                'nombre' => 'Químicos',
                'tipo_ocupacion_id' => 3,
            ),
            107 => 
            array (
                'id' => 108,
                'nombre' => 'Geólogos, Geoquímicos y Geofísicos',
                'tipo_ocupacion_id' => 3,
            ),
            108 => 
            array (
                'id' => 109,
                'nombre' => 'Meteorólogos',
                'tipo_ocupacion_id' => 3,
            ),
            109 => 
            array (
                'id' => 110,
                'nombre' => 'Biólogos, Botánicos, Zoólogos y Relacionados',
                'tipo_ocupacion_id' => 3,
            ),
            110 => 
            array (
                'id' => 111,
                'nombre' => 'Expertos Forestales',
                'tipo_ocupacion_id' => 3,
            ),
            111 => 
            array (
                'id' => 112,
                'nombre' => 'Expertos Agrícolas y Pecuarios',
                'tipo_ocupacion_id' => 3,
            ),
            112 => 
            array (
                'id' => 113,
                'nombre' => 'Administradores Ambientales',
                'tipo_ocupacion_id' => 3,
            ),
            113 => 
            array (
                'id' => 114,
                'nombre' => 'Ingenieros en Construcción y Obras Civiles',
                'tipo_ocupacion_id' => 3,
            ),
            114 => 
            array (
                'id' => 115,
                'nombre' => 'Ingenieros Mecánicos',
                'tipo_ocupacion_id' => 3,
            ),
            115 => 
            array (
                'id' => 116,
                'nombre' => 'Ingenieros Electricistas',
                'tipo_ocupacion_id' => 3,
            ),
            116 => 
            array (
                'id' => 117,
                'nombre' => 'Ingenieros Electrónicos',
                'tipo_ocupacion_id' => 3,
            ),
            117 => 
            array (
                'id' => 118,
                'nombre' => 'Ingenieros Químicos',
                'tipo_ocupacion_id' => 3,
            ),
            118 => 
            array (
                'id' => 119,
                'nombre' => 'Ingenieros de Automatización e Instrumentación',
                'tipo_ocupacion_id' => 3,
            ),
            119 => 
            array (
                'id' => 120,
                'nombre' => 'Ingenieros de Telecomunicaciones',
                'tipo_ocupacion_id' => 3,
            ),
            120 => 
            array (
                'id' => 121,
                'nombre' => 'Ingenieros Navales',
                'tipo_ocupacion_id' => 3,
            ),
            121 => 
            array (
                'id' => 122,
                'nombre' => 'Ingenieros Industriales y de Fabricación',
                'tipo_ocupacion_id' => 3,
            ),
            122 => 
            array (
                'id' => 123,
                'nombre' => 'Ingenieros de Materiales y Metalurgia',
                'tipo_ocupacion_id' => 3,
            ),
            123 => 
            array (
                'id' => 124,
                'nombre' => 'Ingenieros de Minas',
                'tipo_ocupacion_id' => 3,
            ),
            124 => 
            array (
                'id' => 125,
                'nombre' => 'Ingenieros de Petróleos',
                'tipo_ocupacion_id' => 3,
            ),
            125 => 
            array (
                'id' => 126,
                'nombre' => 'Ingenieros de Tecnologías de la Información',
                'tipo_ocupacion_id' => 3,
            ),
            126 => 
            array (
                'id' => 127,
                'nombre' => 'Otros Ingenieros n.c.a.',
                'tipo_ocupacion_id' => 3,
            ),
            127 => 
            array (
                'id' => 128,
                'nombre' => 'Ingenieros y Productores de Audio y Sonido',
                'tipo_ocupacion_id' => 3,
            ),
            128 => 
            array (
                'id' => 129,
                'nombre' => 'Arquitectos',
                'tipo_ocupacion_id' => 3,
            ),
            129 => 
            array (
                'id' => 130,
                'nombre' => 'Urbanistas y Planificadores del Uso del Suelo',
                'tipo_ocupacion_id' => 3,
            ),
            130 => 
            array (
                'id' => 131,
                'nombre' => 'Ingenieros Topográficos',
                'tipo_ocupacion_id' => 3,
            ),
            131 => 
            array (
                'id' => 132,
                'nombre' => 'Diseñadores Industriales',
                'tipo_ocupacion_id' => 3,
            ),
            132 => 
            array (
                'id' => 133,
                'nombre' => 'Matemáticos, Estadísticos y Actuarios',
                'tipo_ocupacion_id' => 3,
            ),
            133 => 
            array (
                'id' => 134,
                'nombre' => 'Analistas de Sistemas Informáticos',
                'tipo_ocupacion_id' => 3,
            ),
            134 => 
            array (
                'id' => 135,
                'nombre' => 'Administradores de Servicios de Tecnologías de la Información',
                'tipo_ocupacion_id' => 3,
            ),
            135 => 
            array (
                'id' => 136,
                'nombre' => 'Desarrolladores de Aplicaciones Informáticas y Digitales',
                'tipo_ocupacion_id' => 3,
            ),
            136 => 
            array (
                'id' => 137,
                'nombre' => 'Técnicos en Química Aplicada',
                'tipo_ocupacion_id' => 3,
            ),
            137 => 
            array (
                'id' => 138,
                'nombre' => 'Técnicos en Geología y Minería',
                'tipo_ocupacion_id' => 3,
            ),
            138 => 
            array (
                'id' => 139,
                'nombre' => 'Técnicos en Meteorología',
                'tipo_ocupacion_id' => 3,
            ),
            139 => 
            array (
                'id' => 140,
                'nombre' => 'Técnicos en Metrología',
                'tipo_ocupacion_id' => 3,
            ),
            140 => 
            array (
                'id' => 141,
                'nombre' => 'Técnicos en Ciencias Biológicas',
                'tipo_ocupacion_id' => 3,
            ),
            141 => 
            array (
                'id' => 142,
                'nombre' => 'Técnicos en Recursos Naturales',
                'tipo_ocupacion_id' => 3,
            ),
            142 => 
            array (
                'id' => 143,
                'nombre' => 'Técnicos en Prevención, Gestión y Control Ambiental',
                'tipo_ocupacion_id' => 3,
            ),
            143 => 
            array (
                'id' => 144,
                'nombre' => 'Técnicos en Construcción y Arquitectura',
                'tipo_ocupacion_id' => 3,
            ),
            144 => 
            array (
                'id' => 145,
                'nombre' => 'Técnicos en Mecánica y Construcción Mecánica',
                'tipo_ocupacion_id' => 3,
            ),
            145 => 
            array (
                'id' => 146,
                'nombre' => 'Técnicos en Fabricación Industrial',
                'tipo_ocupacion_id' => 3,
            ),
            146 => 
            array (
                'id' => 147,
                'nombre' => 'Técnicos en Electricidad',
                'tipo_ocupacion_id' => 3,
            ),
            147 => 
            array (
                'id' => 148,
                'nombre' => 'Técnicos en Electrónica',
                'tipo_ocupacion_id' => 3,
            ),
            148 => 
            array (
                'id' => 149,
                'nombre' => 'Técnicos en Automatización e Instrumentación',
                'tipo_ocupacion_id' => 3,
            ),
            149 => 
            array (
                'id' => 150,
                'nombre' => 'Técnicos en Instrumentos de Aeronavegación',
                'tipo_ocupacion_id' => 3,
            ),
            150 => 
            array (
                'id' => 151,
                'nombre' => 'Técnicos en Telecomunicaciones',
                'tipo_ocupacion_id' => 3,
            ),
            151 => 
            array (
                'id' => 152,
                'nombre' => 'Dibujantes Técnicos',
                'tipo_ocupacion_id' => 3,
            ),
            152 => 
            array (
                'id' => 153,
                'nombre' => 'Topógrafos',
                'tipo_ocupacion_id' => 3,
            ),
            153 => 
            array (
                'id' => 154,
                'nombre' => 'Técnicos en Cartografía',
                'tipo_ocupacion_id' => 3,
            ),
            154 => 
            array (
                'id' => 155,
                'nombre' => 'Inspectores de Pruebas No destructivas',
                'tipo_ocupacion_id' => 3,
            ),
            155 => 
            array (
                'id' => 156,
                'nombre' => 'Inspectores de Sanidad, Seguridad y Salud Ocupacional',
                'tipo_ocupacion_id' => 3,
            ),
            156 => 
            array (
                'id' => 157,
                'nombre' => 'Inspectores de Construcción',
                'tipo_ocupacion_id' => 3,
            ),
            157 => 
            array (
                'id' => 158,
                'nombre' => 'Inspectores de Equipos de Transporte e Instrumentos de Medición',
                'tipo_ocupacion_id' => 3,
            ),
            158 => 
            array (
                'id' => 159,
                'nombre' => 'Inspectores de Productos Agrícola, Pecuarios y de Pesca',
                'tipo_ocupacion_id' => 3,
            ),
            159 => 
            array (
                'id' => 160,
                'nombre' => 'Inspectores de Riego Agrícola',
                'tipo_ocupacion_id' => 3,
            ),
            160 => 
            array (
                'id' => 161,
                'nombre' => 'Coordinadores de Sistemas Integrados de Gestión',
                'tipo_ocupacion_id' => 3,
            ),
            161 => 
            array (
                'id' => 162,
                'nombre' => 'Pilotos, Ingenieros e Instructores de Vuelo',
                'tipo_ocupacion_id' => 3,
            ),
            162 => 
            array (
                'id' => 163,
                'nombre' => 'Controladores de Tráfico Aéreo',
                'tipo_ocupacion_id' => 3,
            ),
            163 => 
            array (
                'id' => 164,
                'nombre' => 'Capitanes y Oficiales de Cubierta',
                'tipo_ocupacion_id' => 3,
            ),
            164 => 
            array (
                'id' => 165,
                'nombre' => 'Oficiales de Máquinas',
                'tipo_ocupacion_id' => 3,
            ),
            165 => 
            array (
                'id' => 166,
                'nombre' => 'Controladores de Tráfico Ferroviario y Marítimo',
                'tipo_ocupacion_id' => 3,
            ),
            166 => 
            array (
                'id' => 167,
                'nombre' => 'Despachadores de Aeronaves',
                'tipo_ocupacion_id' => 3,
            ),
            167 => 
            array (
                'id' => 168,
                'nombre' => 'Técnicos en Tecnologías de la Información',
                'tipo_ocupacion_id' => 3,
            ),
            168 => 
            array (
                'id' => 169,
                'nombre' => 'Asistentes en Saneamiento Ambiental',
                'tipo_ocupacion_id' => 3,
            ),
            169 => 
            array (
                'id' => 170,
                'nombre' => 'Auxiliares de Laboratorio',
                'tipo_ocupacion_id' => 3,
            ),
            170 => 
            array (
                'id' => 171,
                'nombre' => 'Auxiliares de Seguridad en el Trabajo',
                'tipo_ocupacion_id' => 3,
            ),
            171 => 
            array (
                'id' => 172,
                'nombre' => 'Operarios de exploración geofísica y geológica',
                'tipo_ocupacion_id' => 3,
            ),
            172 => 
            array (
                'id' => 173,
                'nombre' => 'Auxiliares en Automatización e Instrumentación Industrial',
                'tipo_ocupacion_id' => 3,
            ),
            173 => 
            array (
                'id' => 174,
                'nombre' => 'Técnicos en Asistencia y Soporte de Tecnologías de la Información',
                'tipo_ocupacion_id' => 3,
            ),
            174 => 
            array (
                'id' => 175,
                'nombre' => 'Médicos Especialistas',
                'tipo_ocupacion_id' => 4,
            ),
            175 => 
            array (
                'id' => 176,
                'nombre' => 'Médicos Generales',
                'tipo_ocupacion_id' => 4,
            ),
            176 => 
            array (
                'id' => 177,
                'nombre' => 'Odontólogos',
                'tipo_ocupacion_id' => 4,
            ),
            177 => 
            array (
                'id' => 178,
                'nombre' => 'Veterinarios',
                'tipo_ocupacion_id' => 4,
            ),
            178 => 
            array (
                'id' => 179,
                'nombre' => 'Optómetras',
                'tipo_ocupacion_id' => 4,
            ),
            179 => 
            array (
                'id' => 180,
                'nombre' => 'Otras Ocupaciones Profesionales en Diagnóstico y Tratamiento de la Salud n.c.a.',
                'tipo_ocupacion_id' => 4,
            ),
            180 => 
            array (
                'id' => 181,
                'nombre' => 'Farmacéuticos y Químicos Farmacéuticos',
                'tipo_ocupacion_id' => 4,
            ),
            181 => 
            array (
                'id' => 182,
                'nombre' => 'Dietistas y Nutricionistas',
                'tipo_ocupacion_id' => 4,
            ),
            182 => 
            array (
                'id' => 183,
                'nombre' => 'Audiólogos y Terapeutas del Lenguaje',
                'tipo_ocupacion_id' => 4,
            ),
            183 => 
            array (
                'id' => 184,
                'nombre' => 'Fisioterapeutas',
                'tipo_ocupacion_id' => 4,
            ),
            184 => 
            array (
                'id' => 185,
                'nombre' => 'Terapeutas Ocupacionales',
                'tipo_ocupacion_id' => 4,
            ),
            185 => 
            array (
                'id' => 186,
                'nombre' => 'Enfermeros',
                'tipo_ocupacion_id' => 4,
            ),
            186 => 
            array (
                'id' => 187,
                'nombre' => 'Psicólogos',
                'tipo_ocupacion_id' => 4,
            ),
            187 => 
            array (
                'id' => 188,
                'nombre' => 'Técnicos de Laboratorio Médico y Patología',
                'tipo_ocupacion_id' => 4,
            ),
            188 => 
            array (
                'id' => 189,
                'nombre' => 'Técnicos en Terapia Respiratoria y Cardiovascular',
                'tipo_ocupacion_id' => 4,
            ),
            189 => 
            array (
                'id' => 190,
                'nombre' => 'Técnicos en Imágenes Diagnósticas',
                'tipo_ocupacion_id' => 4,
            ),
            190 => 
            array (
                'id' => 191,
                'nombre' => 'Técnicos en Radioterapia',
                'tipo_ocupacion_id' => 4,
            ),
            191 => 
            array (
                'id' => 192,
                'nombre' => 'Instrumentadores Quirúrgicos',
                'tipo_ocupacion_id' => 4,
            ),
            192 => 
            array (
                'id' => 193,
                'nombre' => 'Técnicos en Medicina Nuclear',
                'tipo_ocupacion_id' => 4,
            ),
            193 => 
            array (
                'id' => 194,
                'nombre' => 'Regentes de farmacia',
                'tipo_ocupacion_id' => 4,
            ),
            194 => 
            array (
                'id' => 195,
                'nombre' => 'Higienistas Dentales',
                'tipo_ocupacion_id' => 4,
            ),
            195 => 
            array (
                'id' => 196,
                'nombre' => 'Técnicos ópticos',
                'tipo_ocupacion_id' => 4,
            ),
            196 => 
            array (
                'id' => 197,
                'nombre' => 'Practicantes de Medicina Alternativa',
                'tipo_ocupacion_id' => 4,
            ),
            197 => 
            array (
                'id' => 198,
                'nombre' => 'Asistentes de Ambulancia y Otras Ocupaciones Paramédicas',
                'tipo_ocupacion_id' => 4,
            ),
            198 => 
            array (
                'id' => 199,
                'nombre' => 'Otras Ocupaciones Técnicas en Terapia y Valoración n.c.a.',
                'tipo_ocupacion_id' => 4,
            ),
            199 => 
            array (
                'id' => 200,
                'nombre' => 'Auxiliares en Enfermería',
                'tipo_ocupacion_id' => 4,
            ),
            200 => 
            array (
                'id' => 201,
                'nombre' => 'Auxiliares de Salud oral',
                'tipo_ocupacion_id' => 4,
            ),
            201 => 
            array (
                'id' => 202,
                'nombre' => 'Auxiliares en Salud pública',
                'tipo_ocupacion_id' => 4,
            ),
            202 => 
            array (
                'id' => 203,
                'nombre' => 'Auxiliares de Laboratorio Clínico',
                'tipo_ocupacion_id' => 4,
            ),
            203 => 
            array (
                'id' => 204,
                'nombre' => 'Auxiliares de Droguería y Farmacia',
                'tipo_ocupacion_id' => 4,
            ),
            204 => 
            array (
                'id' => 205,
                'nombre' => 'Otros Auxiliares de Servicios a la Salud n.c.a.',
                'tipo_ocupacion_id' => 4,
            ),
            205 => 
            array (
                'id' => 206,
                'nombre' => 'Auxiliares en mecánica dental',
                'tipo_ocupacion_id' => 4,
            ),
            206 => 
            array (
                'id' => 207,
                'nombre' => 'Jueces',
                'tipo_ocupacion_id' => 5,
            ),
            207 => 
            array (
                'id' => 208,
                'nombre' => 'Abogados',
                'tipo_ocupacion_id' => 5,
            ),
            208 => 
            array (
                'id' => 209,
                'nombre' => 'Profesores de Educación Superior',
                'tipo_ocupacion_id' => 5,
            ),
            209 => 
            array (
                'id' => 210,
                'nombre' => 'Especialistas en Procesos Pedagógicos',
                'tipo_ocupacion_id' => 5,
            ),
            210 => 
            array (
                'id' => 211,
                'nombre' => 'Profesores e Instructores de Formación para el Trabajo',
                'tipo_ocupacion_id' => 5,
            ),
            211 => 
            array (
                'id' => 212,
                'nombre' => 'Profesores de Educación Básica Secundaria y Media',
                'tipo_ocupacion_id' => 5,
            ),
            212 => 
            array (
                'id' => 213,
                'nombre' => 'Profesores de Educación Básica Primaria',
                'tipo_ocupacion_id' => 5,
            ),
            213 => 
            array (
                'id' => 214,
                'nombre' => 'Profesores de Preescolar',
                'tipo_ocupacion_id' => 5,
            ),
            214 => 
            array (
                'id' => 215,
                'nombre' => 'Orientadores Educativos',
                'tipo_ocupacion_id' => 5,
            ),
            215 => 
            array (
                'id' => 216,
                'nombre' => 'Pedagogo Reeducador',
                'tipo_ocupacion_id' => 5,
            ),
            216 => 
            array (
                'id' => 217,
                'nombre' => 'Trabajadores Sociales y Consultores de Familia',
                'tipo_ocupacion_id' => 5,
            ),
            217 => 
            array (
                'id' => 218,
                'nombre' => 'Ministros del Culto',
                'tipo_ocupacion_id' => 5,
            ),
            218 => 
            array (
                'id' => 219,
                'nombre' => 'Sociólogos, Antropólogos y Afines',
                'tipo_ocupacion_id' => 5,
            ),
            219 => 
            array (
                'id' => 220,
                'nombre' => 'Filósofos, Filólogos y Afines',
                'tipo_ocupacion_id' => 5,
            ),
            220 => 
            array (
                'id' => 221,
                'nombre' => 'Consultores, Investigadores y Analistas de Política Económica',
                'tipo_ocupacion_id' => 5,
            ),
            221 => 
            array (
                'id' => 222,
                'nombre' => 'Consultores y Funcionarios de Desarrollo Económico y Comercial',
                'tipo_ocupacion_id' => 5,
            ),
            222 => 
            array (
                'id' => 223,
                'nombre' => 'Investigadores, Consultores y Funcionarios de Políticas Sociales de Salud y de Educación',
                'tipo_ocupacion_id' => 5,
            ),
            223 => 
            array (
                'id' => 224,
                'nombre' => 'Funcionarios de Programas Exclusivos de la Administración Pública',
                'tipo_ocupacion_id' => 5,
            ),
            224 => 
            array (
                'id' => 225,
                'nombre' => 'Investigadores, Consultores y Funcionarios de Políticas de Ciencias Naturales y Aplicadas',
                'tipo_ocupacion_id' => 5,
            ),
            225 => 
            array (
                'id' => 226,
                'nombre' => 'Profesionales en Gestión de Riesgo de Desastres',
                'tipo_ocupacion_id' => 5,
            ),
            226 => 
            array (
                'id' => 227,
                'nombre' => 'Profesionales en ciencias forenses',
                'tipo_ocupacion_id' => 5,
            ),
            227 => 
            array (
                'id' => 228,
                'nombre' => 'Asistentes en Servicios Social y Comunitario',
                'tipo_ocupacion_id' => 5,
            ),
            228 => 
            array (
                'id' => 229,
                'nombre' => 'Consejeros de Servicios de Empleo',
                'tipo_ocupacion_id' => 5,
            ),
            229 => 
            array (
                'id' => 230,
                'nombre' => 'Instructores y Profesores de Personas en Condición de Discapacidad',
                'tipo_ocupacion_id' => 5,
            ),
            230 => 
            array (
                'id' => 231,
                'nombre' => 'Otros Instructores',
                'tipo_ocupacion_id' => 5,
            ),
            231 => 
            array (
                'id' => 232,
                'nombre' => 'Ocupaciones Religiosas',
                'tipo_ocupacion_id' => 5,
            ),
            232 => 
            array (
                'id' => 233,
                'nombre' => 'Investigadores Criminalísticos y Judiciales',
                'tipo_ocupacion_id' => 5,
            ),
            233 => 
            array (
                'id' => 234,
                'nombre' => 'Asistentes Legales y Afines',
                'tipo_ocupacion_id' => 5,
            ),
            234 => 
            array (
                'id' => 235,
                'nombre' => 'Auxiliares de educación para la primera infancia',
                'tipo_ocupacion_id' => 5,
            ),
            235 => 
            array (
                'id' => 236,
                'nombre' => 'Bibliotecólogos',
                'tipo_ocupacion_id' => 6,
            ),
            236 => 
            array (
                'id' => 237,
                'nombre' => 'Restauradores',
                'tipo_ocupacion_id' => 6,
            ),
            237 => 
            array (
                'id' => 238,
                'nombre' => 'Curadores',
                'tipo_ocupacion_id' => 6,
            ),
            238 => 
            array (
                'id' => 239,
                'nombre' => 'Escritores',
                'tipo_ocupacion_id' => 6,
            ),
            239 => 
            array (
                'id' => 240,
                'nombre' => 'Editores y Redactores',
                'tipo_ocupacion_id' => 6,
            ),
            240 => 
            array (
                'id' => 241,
                'nombre' => 'Periodistas',
                'tipo_ocupacion_id' => 6,
            ),
            241 => 
            array (
                'id' => 242,
                'nombre' => 'Traductores e Intérpretes',
                'tipo_ocupacion_id' => 6,
            ),
            242 => 
            array (
                'id' => 243,
                'nombre' => 'Ocupaciones Profesionales en Relaciones Públicas y Comunicaciones',
                'tipo_ocupacion_id' => 6,
            ),
            243 => 
            array (
                'id' => 244,
                'nombre' => 'Publicistas',
                'tipo_ocupacion_id' => 6,
            ),
            244 => 
            array (
                'id' => 245,
                'nombre' => 'Productores, Directores Artísticos, Coreógrafos y Ocupaciones Relacionadas',
                'tipo_ocupacion_id' => 6,
            ),
            245 => 
            array (
                'id' => 246,
                'nombre' => 'Intérpretes Musicales',
                'tipo_ocupacion_id' => 6,
            ),
            246 => 
            array (
                'id' => 247,
                'nombre' => 'Bailarines',
                'tipo_ocupacion_id' => 6,
            ),
            247 => 
            array (
                'id' => 248,
                'nombre' => 'Actores',
                'tipo_ocupacion_id' => 6,
            ),
            248 => 
            array (
                'id' => 249,
                'nombre' => 'Pintores, Escultores y Otros Artistas Visuales',
                'tipo_ocupacion_id' => 6,
            ),
            249 => 
            array (
                'id' => 250,
                'nombre' => 'Directores e Investigadores Musicales',
                'tipo_ocupacion_id' => 6,
            ),
            250 => 
            array (
                'id' => 251,
                'nombre' => 'Autores y Compositores Musicales',
                'tipo_ocupacion_id' => 6,
            ),
            251 => 
            array (
                'id' => 252,
                'nombre' => 'Diseñadores Gráficos',
                'tipo_ocupacion_id' => 6,
            ),
            252 => 
            array (
                'id' => 253,
                'nombre' => 'Ocupaciones Técnicas Relacionadas con Museos y Galerías',
                'tipo_ocupacion_id' => 6,
            ),
            253 => 
            array (
                'id' => 254,
                'nombre' => 'Técnicos en Biblioteca',
                'tipo_ocupacion_id' => 6,
            ),
            254 => 
            array (
                'id' => 255,
                'nombre' => 'Técnicos en Promoción y Animación a la Lectura y la Escritura',
                'tipo_ocupacion_id' => 6,
            ),
            255 => 
            array (
                'id' => 256,
                'nombre' => 'Fotógrafos',
                'tipo_ocupacion_id' => 6,
            ),
            256 => 
            array (
                'id' => 257,
                'nombre' => 'Operadores de Cámara de Cine y Televisión',
                'tipo_ocupacion_id' => 6,
            ),
            257 => 
            array (
                'id' => 258,
                'nombre' => 'Técnicos en Diseño y Arte Gráfico',
                'tipo_ocupacion_id' => 6,
            ),
            258 => 
            array (
                'id' => 259,
                'nombre' => 'Técnicos en Transmisión de Radio y Televisión',
                'tipo_ocupacion_id' => 6,
            ),
            259 => 
            array (
                'id' => 260,
                'nombre' => 'Otras Ocupaciones Técnicas en Cine, Televisión y Artes Escénicas n.c.a.',
                'tipo_ocupacion_id' => 6,
            ),
            260 => 
            array (
                'id' => 261,
                'nombre' => 'Ocupaciones de Asistencia en Cine, Televisión y Artes Escénicas',
                'tipo_ocupacion_id' => 6,
            ),
            261 => 
            array (
                'id' => 262,
                'nombre' => 'Productores de Campo para Cine y Televisión',
                'tipo_ocupacion_id' => 6,
            ),
            262 => 
            array (
                'id' => 263,
                'nombre' => 'Locutores de Radio, Televisión y Otros Medios de Comunicación.',
                'tipo_ocupacion_id' => 6,
            ),
            263 => 
            array (
                'id' => 264,
                'nombre' => 'Curadores y Supervisores Musicales',
                'tipo_ocupacion_id' => 6,
            ),
            264 => 
            array (
                'id' => 265,
                'nombre' => 'Otros Artistas n.c.a.',
                'tipo_ocupacion_id' => 6,
            ),
            265 => 
            array (
                'id' => 266,
                'nombre' => 'Diseñadores de Interiores',
                'tipo_ocupacion_id' => 6,
            ),
            266 => 
            array (
                'id' => 267,
                'nombre' => 'Diseñadores de Teatro, Moda, Exhibición y Otros Diseñadores Creativos',
                'tipo_ocupacion_id' => 6,
            ),
            267 => 
            array (
                'id' => 268,
                'nombre' => 'Patronistas de Productos de Tela, Cuero y Piel',
                'tipo_ocupacion_id' => 6,
            ),
            268 => 
            array (
                'id' => 269,
                'nombre' => 'Ilustradores',
                'tipo_ocupacion_id' => 6,
            ),
            269 => 
            array (
                'id' => 270,
                'nombre' => 'Graficadores de Imágenes Computarizadas',
                'tipo_ocupacion_id' => 6,
            ),
            270 => 
            array (
                'id' => 271,
                'nombre' => 'Deportistas',
                'tipo_ocupacion_id' => 6,
            ),
            271 => 
            array (
                'id' => 272,
                'nombre' => 'Entrenadores y Preparadores Físicos',
                'tipo_ocupacion_id' => 6,
            ),
            272 => 
            array (
                'id' => 273,
                'nombre' => 'Árbitros',
                'tipo_ocupacion_id' => 6,
            ),
            273 => 
            array (
                'id' => 274,
                'nombre' => 'Ceramistas',
                'tipo_ocupacion_id' => 6,
            ),
            274 => 
            array (
                'id' => 275,
                'nombre' => 'Tejedores',
                'tipo_ocupacion_id' => 6,
            ),
            275 => 
            array (
                'id' => 276,
                'nombre' => 'Artesanos Trabajos en Maderables y No Maderables',
                'tipo_ocupacion_id' => 6,
            ),
            276 => 
            array (
                'id' => 277,
                'nombre' => 'Artesanos Trabajos en Cuero',
                'tipo_ocupacion_id' => 6,
            ),
            277 => 
            array (
                'id' => 278,
                'nombre' => 'Artesanos Trabajos en Metal',
                'tipo_ocupacion_id' => 6,
            ),
            278 => 
            array (
                'id' => 279,
                'nombre' => 'Otros Artesanos n.c.a.',
                'tipo_ocupacion_id' => 6,
            ),
            279 => 
            array (
                'id' => 280,
                'nombre' => 'Artesanos trabajos en vidrio',
                'tipo_ocupacion_id' => 6,
            ),
            280 => 
            array (
                'id' => 281,
                'nombre' => 'Artesanos trabajos en materiales líticos',
                'tipo_ocupacion_id' => 6,
            ),
            281 => 
            array (
                'id' => 282,
                'nombre' => 'Artesanos trabajos en papel',
                'tipo_ocupacion_id' => 6,
            ),
            282 => 
            array (
                'id' => 283,
                'nombre' => 'Operadores de audio y sonido',
                'tipo_ocupacion_id' => 6,
            ),
            283 => 
            array (
                'id' => 284,
                'nombre' => 'Ejecutantes Musicales',
                'tipo_ocupacion_id' => 6,
            ),
            284 => 
            array (
                'id' => 285,
                'nombre' => 'Auxiliares de Producción de Audio y Sonido',
                'tipo_ocupacion_id' => 6,
            ),
            285 => 
            array (
                'id' => 286,
                'nombre' => 'Supervisores de Ventas',
                'tipo_ocupacion_id' => 7,
            ),
            286 => 
            array (
                'id' => 287,
                'nombre' => 'Administradores y Supervisores de Comercio al Por Menor',
                'tipo_ocupacion_id' => 7,
            ),
            287 => 
            array (
                'id' => 288,
                'nombre' => 'Supervisores de Servicios de Alimentos',
                'tipo_ocupacion_id' => 7,
            ),
            288 => 
            array (
                'id' => 289,
                'nombre' => 'Supervisores de Personal de Manejo Doméstico',
                'tipo_ocupacion_id' => 7,
            ),
            289 => 
            array (
                'id' => 290,
                'nombre' => 'Sommeliers',
                'tipo_ocupacion_id' => 7,
            ),
            290 => 
            array (
                'id' => 291,
                'nombre' => 'Supervisores de servicios de Alojamiento y Hospedaje',
                'tipo_ocupacion_id' => 7,
            ),
            291 => 
            array (
                'id' => 292,
                'nombre' => 'Suboficiales de las Fuerzas Militares',
                'tipo_ocupacion_id' => 7,
            ),
            292 => 
            array (
                'id' => 293,
                'nombre' => 'Suboficiales y nivel ejecutivo de la Policía',
                'tipo_ocupacion_id' => 7,
            ),
            293 => 
            array (
                'id' => 294,
                'nombre' => 'Supervisores de Vigilantes',
                'tipo_ocupacion_id' => 7,
            ),
            294 => 
            array (
                'id' => 295,
                'nombre' => 'Suboficiales del Cuerpo de Custodia y Vigilancia',
                'tipo_ocupacion_id' => 7,
            ),
            295 => 
            array (
                'id' => 296,
                'nombre' => 'Suboficiales de Bomberos',
                'tipo_ocupacion_id' => 7,
            ),
            296 => 
            array (
                'id' => 297,
                'nombre' => 'Agentes y Corredores de Seguros',
                'tipo_ocupacion_id' => 7,
            ),
            297 => 
            array (
                'id' => 298,
                'nombre' => 'Agentes de Bienes Raíces',
                'tipo_ocupacion_id' => 7,
            ),
            298 => 
            array (
                'id' => 299,
                'nombre' => 'Vendedores de Ventas Técnicas',
                'tipo_ocupacion_id' => 7,
            ),
            299 => 
            array (
                'id' => 300,
                'nombre' => 'Agentes de Compras e Intermediarios',
                'tipo_ocupacion_id' => 7,
            ),
            300 => 
            array (
                'id' => 301,
                'nombre' => 'Representante de servicios especializados',
                'tipo_ocupacion_id' => 7,
            ),
            301 => 
            array (
                'id' => 302,
                'nombre' => 'Administradores de Comunidades Virtuales',
                'tipo_ocupacion_id' => 7,
            ),
            302 => 
            array (
                'id' => 303,
                'nombre' => 'Agentes y Promotores Artísticos',
                'tipo_ocupacion_id' => 7,
            ),
            303 => 
            array (
                'id' => 304,
                'nombre' => 'Coordinadores y Productores de Eventos y Espectáculos',
                'tipo_ocupacion_id' => 7,
            ),
            304 => 
            array (
                'id' => 305,
                'nombre' => 'Chefs',
                'tipo_ocupacion_id' => 7,
            ),
            305 => 
            array (
                'id' => 306,
                'nombre' => 'Auxiliares de Vuelo y Sobrecargos',
                'tipo_ocupacion_id' => 7,
            ),
            306 => 
            array (
                'id' => 307,
                'nombre' => 'Tanatopractores',
                'tipo_ocupacion_id' => 7,
            ),
            307 => 
            array (
                'id' => 308,
                'nombre' => 'Coordinadores De Servicios Funerarios',
                'tipo_ocupacion_id' => 7,
            ),
            308 => 
            array (
                'id' => 309,
                'nombre' => 'Intérpretes De Lengua De Señas Colombiana - Español',
                'tipo_ocupacion_id' => 7,
            ),
            309 => 
            array (
                'id' => 310,
                'nombre' => 'Guías-intérpretes',
                'tipo_ocupacion_id' => 7,
            ),
            310 => 
            array (
                'id' => 311,
                'nombre' => 'Guías de Turismo',
                'tipo_ocupacion_id' => 7,
            ),
            311 => 
            array (
                'id' => 312,
                'nombre' => 'Vendedores de Ventas no Técnicas',
                'tipo_ocupacion_id' => 7,
            ),
            312 => 
            array (
                'id' => 313,
                'nombre' => 'Auxiliares de Promoción Artística',
                'tipo_ocupacion_id' => 7,
            ),
            313 => 
            array (
                'id' => 314,
                'nombre' => 'Vendedores de Mostrador',
                'tipo_ocupacion_id' => 7,
            ),
            314 => 
            array (
                'id' => 315,
                'nombre' => 'Mercaderistas e Impulsadores',
                'tipo_ocupacion_id' => 7,
            ),
            315 => 
            array (
                'id' => 316,
                'nombre' => 'Cajeros de Comercio',
                'tipo_ocupacion_id' => 7,
            ),
            316 => 
            array (
                'id' => 317,
                'nombre' => 'Modelos',
                'tipo_ocupacion_id' => 7,
            ),
            317 => 
            array (
                'id' => 318,
                'nombre' => 'Agentes de Viajes',
                'tipo_ocupacion_id' => 7,
            ),
            318 => 
            array (
                'id' => 319,
                'nombre' => 'Empleados de Ventas y Servicios de Líneas Aéreas, Marítimas y Terrestres',
                'tipo_ocupacion_id' => 7,
            ),
            319 => 
            array (
                'id' => 320,
                'nombre' => 'Empleados de Recepción Hotelera',
                'tipo_ocupacion_id' => 7,
            ),
            320 => 
            array (
                'id' => 321,
                'nombre' => 'Informadores Turísticos',
                'tipo_ocupacion_id' => 7,
            ),
            321 => 
            array (
                'id' => 322,
                'nombre' => 'Recreadores',
                'tipo_ocupacion_id' => 7,
            ),
            322 => 
            array (
                'id' => 323,
                'nombre' => 'Operadores de Juegos Mecánicos y de Salón',
                'tipo_ocupacion_id' => 7,
            ),
            323 => 
            array (
                'id' => 324,
                'nombre' => 'Auxiliares de Producción de Eventos y Espectáculos',
                'tipo_ocupacion_id' => 7,
            ),
            324 => 
            array (
                'id' => 325,
                'nombre' => 'Cortadores de Carne para Comercio Mayorista y al Detal',
                'tipo_ocupacion_id' => 7,
            ),
            325 => 
            array (
                'id' => 326,
                'nombre' => 'Panaderos y Pasteleros',
                'tipo_ocupacion_id' => 7,
            ),
            326 => 
            array (
                'id' => 327,
                'nombre' => 'Meseros y Capitán de Meseros',
                'tipo_ocupacion_id' => 7,
            ),
            327 => 
            array (
                'id' => 328,
                'nombre' => 'Bartender',
                'tipo_ocupacion_id' => 7,
            ),
            328 => 
            array (
                'id' => 329,
                'nombre' => 'Cocineros',
                'tipo_ocupacion_id' => 7,
            ),
            329 => 
            array (
                'id' => 330,
                'nombre' => 'Baristas',
                'tipo_ocupacion_id' => 7,
            ),
            330 => 
            array (
                'id' => 331,
                'nombre' => 'Inspectores de Policía',
                'tipo_ocupacion_id' => 7,
            ),
            331 => 
            array (
                'id' => 332,
                'nombre' => 'Funcionarios de Regulación',
                'tipo_ocupacion_id' => 7,
            ),
            332 => 
            array (
                'id' => 333,
                'nombre' => 'Auxiliares de policía',
                'tipo_ocupacion_id' => 7,
            ),
            333 => 
            array (
                'id' => 334,
                'nombre' => 'Bomberos',
                'tipo_ocupacion_id' => 7,
            ),
            334 => 
            array (
                'id' => 335,
                'nombre' => 'Guardianes de Prisión',
                'tipo_ocupacion_id' => 7,
            ),
            335 => 
            array (
                'id' => 336,
                'nombre' => 'Soldados',
                'tipo_ocupacion_id' => 7,
            ),
            336 => 
            array (
                'id' => 337,
                'nombre' => 'Vigilantes y Guardias de Seguridad',
                'tipo_ocupacion_id' => 7,
            ),
            337 => 
            array (
                'id' => 338,
                'nombre' => 'Técnicos Investigadores Criminalísticos y Judiciales',
                'tipo_ocupacion_id' => 7,
            ),
            338 => 
            array (
                'id' => 339,
                'nombre' => 'Acompañantes Domiciliarios',
                'tipo_ocupacion_id' => 7,
            ),
            339 => 
            array (
                'id' => 340,
                'nombre' => 'Auxiliares del Cuidado de Niños',
                'tipo_ocupacion_id' => 7,
            ),
            340 => 
            array (
                'id' => 341,
                'nombre' => 'Peluqueros',
                'tipo_ocupacion_id' => 7,
            ),
            341 => 
            array (
                'id' => 342,
                'nombre' => 'Trabajadores del Cuidado de Animales',
                'tipo_ocupacion_id' => 7,
            ),
            342 => 
            array (
                'id' => 343,
                'nombre' => 'Auxiliares de Servicios Funerarios',
                'tipo_ocupacion_id' => 7,
            ),
            343 => 
            array (
                'id' => 344,
                'nombre' => 'Astrólogos, Adivinadores y Relacionados',
                'tipo_ocupacion_id' => 7,
            ),
            344 => 
            array (
                'id' => 345,
                'nombre' => 'Manicuristas y Pedicuristas',
                'tipo_ocupacion_id' => 7,
            ),
            345 => 
            array (
                'id' => 346,
                'nombre' => 'Cosmetólogos Esteticistas',
                'tipo_ocupacion_id' => 7,
            ),
            346 => 
            array (
                'id' => 347,
                'nombre' => 'Maquilladores',
                'tipo_ocupacion_id' => 7,
            ),
            347 => 
            array (
                'id' => 348,
                'nombre' => 'Trabajadores de Estación de Servicio',
                'tipo_ocupacion_id' => 7,
            ),
            348 => 
            array (
                'id' => 349,
                'nombre' => 'Otras Ocupaciones Elementales de las Ventas',
                'tipo_ocupacion_id' => 7,
            ),
            349 => 
            array (
                'id' => 350,
                'nombre' => 'Ayudantes de establecimientos de alimentos y bebidas',
                'tipo_ocupacion_id' => 7,
            ),
            350 => 
            array (
                'id' => 351,
                'nombre' => 'Aseadores y Servicio Doméstico',
                'tipo_ocupacion_id' => 7,
            ),
            351 => 
            array (
                'id' => 352,
                'nombre' => 'Aseadores Especializados y Fumigadores',
                'tipo_ocupacion_id' => 7,
            ),
            352 => 
            array (
                'id' => 353,
                'nombre' => 'Recolectores de Material para Reciclaje',
                'tipo_ocupacion_id' => 7,
            ),
            353 => 
            array (
                'id' => 354,
                'nombre' => 'Auxiliares de Servicios a Viajeros',
                'tipo_ocupacion_id' => 7,
            ),
            354 => 
            array (
                'id' => 355,
                'nombre' => 'Auxiliares de Servicios de Recreación y Deporte',
                'tipo_ocupacion_id' => 7,
            ),
            355 => 
            array (
                'id' => 356,
                'nombre' => 'Empleados de Lavandería',
                'tipo_ocupacion_id' => 7,
            ),
            356 => 
            array (
                'id' => 357,
                'nombre' => 'Otras Ocupaciones Elementales de los Servicios n.c.a.',
                'tipo_ocupacion_id' => 7,
            ),
            357 => 
            array (
                'id' => 358,
                'nombre' => 'Auxiliares de servicios hoteleros',
                'tipo_ocupacion_id' => 7,
            ),
            358 => 
            array (
                'id' => 359,
                'nombre' => 'Operarios de Cementerios',
                'tipo_ocupacion_id' => 7,
            ),
            359 => 
            array (
                'id' => 360,
                'nombre' => 'Anfitriones Turísticos Locales',
                'tipo_ocupacion_id' => 7,
            ),
            360 => 
            array (
                'id' => 361,
                'nombre' => 'Administradores de Explotación Acuícola y Jefes de Laboratorio de Cultivo o Producción Acuícola',
                'tipo_ocupacion_id' => 8,
            ),
            361 => 
            array (
                'id' => 362,
                'nombre' => 'Supervisores de Minería y Canteras',
                'tipo_ocupacion_id' => 8,
            ),
            362 => 
            array (
                'id' => 363,
                'nombre' => 'Supervisores de Perforación y Servicios, Pozos de Petróleo y Gas',
                'tipo_ocupacion_id' => 8,
            ),
            363 => 
            array (
                'id' => 364,
                'nombre' => 'Inspectores de Sistemas e Instalaciones de Gas',
                'tipo_ocupacion_id' => 8,
            ),
            364 => 
            array (
                'id' => 365,
                'nombre' => 'Supervisores y analistas de producción de hidrocarburos',
                'tipo_ocupacion_id' => 8,
            ),
            365 => 
            array (
                'id' => 366,
                'nombre' => 'Supervisores de Producción Agrícola',
                'tipo_ocupacion_id' => 8,
            ),
            366 => 
            array (
                'id' => 367,
                'nombre' => 'Supervisores de Producción Pecuaria',
                'tipo_ocupacion_id' => 8,
            ),
            367 => 
            array (
                'id' => 368,
                'nombre' => 'Supervisores de Explotación Forestal y Silvicultura',
                'tipo_ocupacion_id' => 8,
            ),
            368 => 
            array (
                'id' => 369,
                'nombre' => 'Agricultores y Administradores Agropecuarios',
                'tipo_ocupacion_id' => 8,
            ),
            369 => 
            array (
                'id' => 370,
                'nombre' => 'Contratistas de Servicios Agrícolas y Relacionados',
                'tipo_ocupacion_id' => 8,
            ),
            370 => 
            array (
                'id' => 371,
                'nombre' => 'Contratistas y Supervisores de Servicios de Jardinería y Viverismo',
                'tipo_ocupacion_id' => 8,
            ),
            371 => 
            array (
                'id' => 372,
                'nombre' => 'Capitanes y Patrones de Pesca',
                'tipo_ocupacion_id' => 8,
            ),
            372 => 
            array (
                'id' => 373,
                'nombre' => 'Operarios de Apoyo y Servicios en Minería Bajo Tierra',
                'tipo_ocupacion_id' => 8,
            ),
            373 => 
            array (
                'id' => 374,
                'nombre' => 'Operarios de Apoyo y Servicios en Perforación de Petróleo y Gas',
                'tipo_ocupacion_id' => 8,
            ),
            374 => 
            array (
                'id' => 375,
                'nombre' => 'Mineros de Producción Bajo Tierra',
                'tipo_ocupacion_id' => 8,
            ),
            375 => 
            array (
                'id' => 376,
                'nombre' => 'Perforadores de Pozos de Gas y Petróleo y Trabajadores Relacionados',
                'tipo_ocupacion_id' => 8,
            ),
            376 => 
            array (
                'id' => 377,
                'nombre' => 'Inspectores de Construcción de Oleoductos y Gasoductos',
                'tipo_ocupacion_id' => 8,
            ),
            377 => 
            array (
                'id' => 378,
                'nombre' => 'Operadores de Equipo Minero',
                'tipo_ocupacion_id' => 8,
            ),
            378 => 
            array (
                'id' => 379,
                'nombre' => 'Operadores de producción de hidrocarburos',
                'tipo_ocupacion_id' => 8,
            ),
            379 => 
            array (
                'id' => 380,
                'nombre' => 'Operarios de servicios a pozos de hidrocarburos',
                'tipo_ocupacion_id' => 8,
            ),
            380 => 
            array (
                'id' => 381,
                'nombre' => 'Operarios torres de perforación de hidrocarburos',
                'tipo_ocupacion_id' => 8,
            ),
            381 => 
            array (
                'id' => 382,
                'nombre' => 'Trabajadores de Explotación Forestal',
                'tipo_ocupacion_id' => 8,
            ),
            382 => 
            array (
                'id' => 383,
                'nombre' => 'Trabajadores de Silvicultura y Forestación',
                'tipo_ocupacion_id' => 8,
            ),
            383 => 
            array (
                'id' => 384,
                'nombre' => 'Trabajadores Agrícolas',
                'tipo_ocupacion_id' => 8,
            ),
            384 => 
            array (
                'id' => 385,
                'nombre' => 'Trabajadores Pecuarios',
                'tipo_ocupacion_id' => 8,
            ),
            385 => 
            array (
                'id' => 386,
                'nombre' => 'Trabajadores de Vivero',
                'tipo_ocupacion_id' => 8,
            ),
            386 => 
            array (
                'id' => 387,
                'nombre' => 'Trabajadores del Campo',
                'tipo_ocupacion_id' => 8,
            ),
            387 => 
            array (
                'id' => 388,
                'nombre' => 'Trabajadores de Plantas de Incubación Artificial',
                'tipo_ocupacion_id' => 8,
            ),
            388 => 
            array (
                'id' => 389,
                'nombre' => 'Rayadores de Caucho',
                'tipo_ocupacion_id' => 8,
            ),
            389 => 
            array (
                'id' => 390,
                'nombre' => 'Operarios de Riego Agrícola',
                'tipo_ocupacion_id' => 8,
            ),
            390 => 
            array (
                'id' => 391,
                'nombre' => 'Pescadores',
                'tipo_ocupacion_id' => 8,
            ),
            391 => 
            array (
                'id' => 392,
                'nombre' => 'Operario Acuícola',
                'tipo_ocupacion_id' => 8,
            ),
            392 => 
            array (
                'id' => 393,
                'nombre' => 'Técnico Acuícola en Sistemas de Reproducción',
                'tipo_ocupacion_id' => 8,
            ),
            393 => 
            array (
                'id' => 394,
                'nombre' => 'Técnico Acuícola en Sistemas de Levante y Engorde',
                'tipo_ocupacion_id' => 8,
            ),
            394 => 
            array (
                'id' => 395,
                'nombre' => 'Obreros y Ayudantes de Minería',
                'tipo_ocupacion_id' => 8,
            ),
            395 => 
            array (
                'id' => 396,
                'nombre' => 'Obreros y Ayudantes de Producción en Pozos de Petróleo y Gas',
                'tipo_ocupacion_id' => 8,
            ),
            396 => 
            array (
                'id' => 397,
                'nombre' => 'Obreros Agropecuarios',
                'tipo_ocupacion_id' => 8,
            ),
            397 => 
            array (
                'id' => 398,
                'nombre' => 'Jardineros',
                'tipo_ocupacion_id' => 8,
            ),
            398 => 
            array (
                'id' => 399,
                'nombre' => 'Contratistas y Supervisores de Ajustadores de Máquinas y Herramientas, y de Ocupaciones Relacionadas',
                'tipo_ocupacion_id' => 9,
            ),
            399 => 
            array (
                'id' => 400,
                'nombre' => 'Contratistas y Supervisores de Electricidad y Telecomunicaciones',
                'tipo_ocupacion_id' => 9,
            ),
            400 => 
            array (
                'id' => 401,
                'nombre' => 'Contratistas y Supervisores de Instalación de Tuberías',
                'tipo_ocupacion_id' => 9,
            ),
            401 => 
            array (
                'id' => 402,
                'nombre' => 'Contratistas y Supervisores de Moldeo de Forja y Montaje de Estructuras Metálicas',
                'tipo_ocupacion_id' => 9,
            ),
            402 => 
            array (
                'id' => 403,
                'nombre' => 'Contratistas y Supervisores de Carpintería',
                'tipo_ocupacion_id' => 9,
            ),
            403 => 
            array (
                'id' => 404,
                'nombre' => 'Contratistas y Supervisores de Mecánica',
                'tipo_ocupacion_id' => 9,
            ),
            404 => 
            array (
                'id' => 405,
                'nombre' => 'Contratistas y Supervisores de Operación de Equipo Pesado',
                'tipo_ocupacion_id' => 9,
            ),
            405 => 
            array (
                'id' => 406,
                'nombre' => 'Maestros Generales de Obra y Supervisores de Construcción, Instalación y Reparación',
                'tipo_ocupacion_id' => 9,
            ),
            406 => 
            array (
                'id' => 407,
                'nombre' => 'Supervisores de Operación de Transporte Ferroviario',
                'tipo_ocupacion_id' => 9,
            ),
            407 => 
            array (
                'id' => 408,
            'nombre' => 'Supervisores de Operación de Transporte Terrestre (no ferroviario)',
                'tipo_ocupacion_id' => 9,
            ),
            408 => 
            array (
                'id' => 409,
                'nombre' => 'Ajustadores de Máquinas y Herramientas',
                'tipo_ocupacion_id' => 9,
            ),
            409 => 
            array (
                'id' => 410,
                'nombre' => 'Modelistas y Matriceros',
                'tipo_ocupacion_id' => 9,
            ),
            410 => 
            array (
                'id' => 411,
                'nombre' => 'Electricistas Industriales',
                'tipo_ocupacion_id' => 9,
            ),
            411 => 
            array (
                'id' => 412,
                'nombre' => 'Electricistas Residenciales',
                'tipo_ocupacion_id' => 9,
            ),
            412 => 
            array (
                'id' => 413,
                'nombre' => 'Instaladores de Redes de Energía Eléctrica',
                'tipo_ocupacion_id' => 9,
            ),
            413 => 
            array (
                'id' => 414,
                'nombre' => 'Técnicos instaladores de Redes y Líneas de Telecomunicaciones',
                'tipo_ocupacion_id' => 9,
            ),
            414 => 
            array (
                'id' => 415,
                'nombre' => 'Auxiliares técnicos de instalación, mantenimiento y reparación de sistemas de Telecomunicaciones',
                'tipo_ocupacion_id' => 9,
            ),
            415 => 
            array (
                'id' => 416,
                'nombre' => 'Operarios de Mantenimiento y Servicio de Televisión por Cable',
                'tipo_ocupacion_id' => 9,
            ),
            416 => 
            array (
                'id' => 417,
                'nombre' => 'Plomeros',
                'tipo_ocupacion_id' => 9,
            ),
            417 => 
            array (
                'id' => 418,
                'nombre' => 'Instaladores de Tuberías para Sistemas de Extinción de Incendios',
                'tipo_ocupacion_id' => 9,
            ),
            418 => 
            array (
                'id' => 419,
                'nombre' => 'Instaladores de Redes y Equipos a Gas',
                'tipo_ocupacion_id' => 9,
            ),
            419 => 
            array (
                'id' => 420,
                'nombre' => 'Chapistas, Caldereros y Paileros',
                'tipo_ocupacion_id' => 9,
            ),
            420 => 
            array (
                'id' => 421,
                'nombre' => 'Soldadores',
                'tipo_ocupacion_id' => 9,
            ),
            421 => 
            array (
                'id' => 422,
                'nombre' => 'Montadores de Estructuras Metálicas',
                'tipo_ocupacion_id' => 9,
            ),
            422 => 
            array (
                'id' => 423,
                'nombre' => 'Ornamentistas y Forjadores',
                'tipo_ocupacion_id' => 9,
            ),
            423 => 
            array (
                'id' => 424,
                'nombre' => 'Tuberos',
                'tipo_ocupacion_id' => 9,
            ),
            424 => 
            array (
                'id' => 425,
                'nombre' => 'Carpinteros',
                'tipo_ocupacion_id' => 9,
            ),
            425 => 
            array (
                'id' => 426,
                'nombre' => 'Ebanistas',
                'tipo_ocupacion_id' => 9,
            ),
            426 => 
            array (
                'id' => 427,
                'nombre' => 'Oficiales de Construcción',
                'tipo_ocupacion_id' => 9,
            ),
            427 => 
            array (
                'id' => 428,
                'nombre' => 'Trabajadores en Concreto, Hormigón y Enfoscado',
                'tipo_ocupacion_id' => 9,
            ),
            428 => 
            array (
                'id' => 429,
                'nombre' => 'Enchapadores',
                'tipo_ocupacion_id' => 9,
            ),
            429 => 
            array (
                'id' => 430,
                'nombre' => 'Techadores',
                'tipo_ocupacion_id' => 9,
            ),
            430 => 
            array (
                'id' => 431,
                'nombre' => 'Instaladores de Material Aislante',
                'tipo_ocupacion_id' => 9,
            ),
            431 => 
            array (
                'id' => 432,
                'nombre' => 'Pintores y Empapeladores',
                'tipo_ocupacion_id' => 9,
            ),
            432 => 
            array (
                'id' => 433,
                'nombre' => 'Instaladores de Pisos',
                'tipo_ocupacion_id' => 9,
            ),
            433 => 
            array (
                'id' => 434,
                'nombre' => 'Revocadores',
                'tipo_ocupacion_id' => 9,
            ),
            434 => 
            array (
                'id' => 435,
                'nombre' => 'Mecánicos Industriales',
                'tipo_ocupacion_id' => 9,
            ),
            435 => 
            array (
                'id' => 436,
                'nombre' => 'Mecánicos de Maquinaria Textil, confección, cuero, calzado y marroquinería',
                'tipo_ocupacion_id' => 9,
            ),
            436 => 
            array (
                'id' => 437,
                'nombre' => 'Mecánicos de Equipo Pesado',
                'tipo_ocupacion_id' => 9,
            ),
            437 => 
            array (
                'id' => 438,
                'nombre' => 'Mecánicos de Aviación',
                'tipo_ocupacion_id' => 9,
            ),
            438 => 
            array (
                'id' => 439,
                'nombre' => 'Técnicos de Aire Acondicionado y Refrigeración',
                'tipo_ocupacion_id' => 9,
            ),
            439 => 
            array (
                'id' => 440,
                'nombre' => 'Mecánicos de Vehículos Automotores',
                'tipo_ocupacion_id' => 9,
            ),
            440 => 
            array (
                'id' => 441,
                'nombre' => 'Electricistas de Vehículos Automotores',
                'tipo_ocupacion_id' => 9,
            ),
            441 => 
            array (
                'id' => 442,
                'nombre' => 'Mecánicos de Motos',
                'tipo_ocupacion_id' => 9,
            ),
            442 => 
            array (
                'id' => 443,
                'nombre' => 'Latoneros',
                'tipo_ocupacion_id' => 9,
            ),
            443 => 
            array (
                'id' => 444,
                'nombre' => 'Reparadores de Aparatos Electrodomésticos',
                'tipo_ocupacion_id' => 9,
            ),
            444 => 
            array (
                'id' => 445,
                'nombre' => 'Mecánicos Electricistas',
                'tipo_ocupacion_id' => 9,
            ),
            445 => 
            array (
                'id' => 446,
                'nombre' => 'Auxiliares técnicos en electrónica',
                'tipo_ocupacion_id' => 9,
            ),
            446 => 
            array (
                'id' => 447,
                'nombre' => 'Mecánicos de Otros Pequeñas Máquinas y Motores',
                'tipo_ocupacion_id' => 9,
            ),
            447 => 
            array (
                'id' => 448,
                'nombre' => 'Instaladores Residenciales y Comerciales',
                'tipo_ocupacion_id' => 9,
            ),
            448 => 
            array (
                'id' => 449,
                'nombre' => 'Operarios de Mantenimiento de Instalaciones de Abastecimiento de Agua y Gas',
                'tipo_ocupacion_id' => 9,
            ),
            449 => 
            array (
                'id' => 450,
                'nombre' => 'Vidrieros',
                'tipo_ocupacion_id' => 9,
            ),
            450 => 
            array (
                'id' => 451,
                'nombre' => 'Ayudantes Electricistas',
                'tipo_ocupacion_id' => 9,
            ),
            451 => 
            array (
                'id' => 452,
                'nombre' => 'Ayudantes de Mecánica',
                'tipo_ocupacion_id' => 9,
            ),
            452 => 
            array (
                'id' => 453,
                'nombre' => 'Otros Reparadores n.c.a.',
                'tipo_ocupacion_id' => 9,
            ),
            453 => 
            array (
                'id' => 454,
                'nombre' => 'Tapiceros',
                'tipo_ocupacion_id' => 9,
            ),
            454 => 
            array (
                'id' => 455,
                'nombre' => 'Sastres, Modistos, Peleteros y Sombrereros',
                'tipo_ocupacion_id' => 9,
            ),
            455 => 
            array (
                'id' => 456,
                'nombre' => 'Zapateros y Afines',
                'tipo_ocupacion_id' => 9,
            ),
            456 => 
            array (
                'id' => 457,
                'nombre' => 'Joyeros y Relojeros',
                'tipo_ocupacion_id' => 9,
            ),
            457 => 
            array (
                'id' => 458,
                'nombre' => 'Tipógrafos',
                'tipo_ocupacion_id' => 9,
            ),
            458 => 
            array (
                'id' => 459,
                'nombre' => 'Cerrajeros y afines',
                'tipo_ocupacion_id' => 9,
            ),
            459 => 
            array (
                'id' => 460,
                'nombre' => 'Buzos',
                'tipo_ocupacion_id' => 9,
            ),
            460 => 
            array (
                'id' => 461,
                'nombre' => 'Operadores de Máquinas Estacionarias y Equipo Auxiliar',
                'tipo_ocupacion_id' => 9,
            ),
            461 => 
            array (
                'id' => 462,
                'nombre' => 'Operadores de Plantas de Generación y Distribución de Energía',
                'tipo_ocupacion_id' => 9,
            ),
            462 => 
            array (
                'id' => 463,
                'nombre' => 'Operadores de Planta de Gas',
                'tipo_ocupacion_id' => 9,
            ),
            463 => 
            array (
                'id' => 464,
                'nombre' => 'Operadores de Grúa',
                'tipo_ocupacion_id' => 9,
            ),
            464 => 
            array (
                'id' => 465,
                'nombre' => 'Perforadores y Operarios de Voladura para Minería de Superficie de Canteras y Construcción',
                'tipo_ocupacion_id' => 9,
            ),
            465 => 
            array (
                'id' => 466,
                'nombre' => 'Perforadores de Pozos de Agua',
                'tipo_ocupacion_id' => 9,
            ),
            466 => 
            array (
                'id' => 467,
            'nombre' => 'Operadores de Equipo Pesado (excepto grúa)',
                'tipo_ocupacion_id' => 9,
            ),
            467 => 
            array (
                'id' => 468,
                'nombre' => 'Operadores de Equipo para Limpieza de Vías y Alcantarillado',
                'tipo_ocupacion_id' => 9,
            ),
            468 => 
            array (
                'id' => 469,
                'nombre' => 'Operadores de Maquinaria Agrícola',
                'tipo_ocupacion_id' => 9,
            ),
            469 => 
            array (
                'id' => 470,
                'nombre' => 'Maquinistas de Transporte Ferroviario',
                'tipo_ocupacion_id' => 9,
            ),
            470 => 
            array (
                'id' => 471,
                'nombre' => 'Guardafrenos y Otros Operadores Ferroviarios',
                'tipo_ocupacion_id' => 9,
            ),
            471 => 
            array (
                'id' => 472,
                'nombre' => 'Conductores de Vehículos Pesados',
                'tipo_ocupacion_id' => 9,
            ),
            472 => 
            array (
                'id' => 473,
                'nombre' => 'Conductores de Bus, Operadores de Metro y Otros Medios de Transporte Colectivo',
                'tipo_ocupacion_id' => 9,
            ),
            473 => 
            array (
                'id' => 474,
                'nombre' => 'Conductores de Vehículos Livianos',
                'tipo_ocupacion_id' => 9,
            ),
            474 => 
            array (
                'id' => 475,
                'nombre' => 'Conductores de Transporte de Alimentos',
                'tipo_ocupacion_id' => 9,
            ),
            475 => 
            array (
                'id' => 476,
                'nombre' => 'Marineros de Cubierta',
                'tipo_ocupacion_id' => 9,
            ),
            476 => 
            array (
                'id' => 477,
                'nombre' => 'Marineros de Sala de Máquinas',
                'tipo_ocupacion_id' => 9,
            ),
            477 => 
            array (
                'id' => 478,
                'nombre' => 'Operadores de Pequeñas Embarcaciones',
                'tipo_ocupacion_id' => 9,
            ),
            478 => 
            array (
                'id' => 479,
                'nombre' => 'Operarios de Rampa de Transporte Aéreo',
                'tipo_ocupacion_id' => 9,
            ),
            479 => 
            array (
                'id' => 480,
                'nombre' => 'Operarios Portuarios',
                'tipo_ocupacion_id' => 9,
            ),
            480 => 
            array (
                'id' => 481,
                'nombre' => 'Operarios de Cargue y Descargue de Materiales',
                'tipo_ocupacion_id' => 9,
            ),
            481 => 
            array (
                'id' => 482,
                'nombre' => 'Aparejadores',
                'tipo_ocupacion_id' => 9,
            ),
            482 => 
            array (
                'id' => 483,
                'nombre' => 'Ayudantes y Obreros de Construcción',
                'tipo_ocupacion_id' => 9,
            ),
            483 => 
            array (
                'id' => 484,
                'nombre' => 'Ayudantes de Otros Oficios',
                'tipo_ocupacion_id' => 9,
            ),
            484 => 
            array (
                'id' => 485,
                'nombre' => 'Obreros de Mantenimiento de Obras Públicas',
                'tipo_ocupacion_id' => 9,
            ),
            485 => 
            array (
                'id' => 486,
                'nombre' => 'Ayudantes de Transporte Automotor',
                'tipo_ocupacion_id' => 9,
            ),
            486 => 
            array (
                'id' => 487,
                'nombre' => 'Directores de Planta de Procesamiento de Alimentos y Bebidas',
                'tipo_ocupacion_id' => 10,
            ),
            487 => 
            array (
                'id' => 488,
                'nombre' => 'Jefe de Laboratorio de Alimentos',
                'tipo_ocupacion_id' => 10,
            ),
            488 => 
            array (
                'id' => 489,
                'nombre' => 'Supervisores de Tratamiento de Metales y Minerales',
                'tipo_ocupacion_id' => 10,
            ),
            489 => 
            array (
                'id' => 490,
                'nombre' => 'Supervisores de Procesamiento de Químico, Petróleo, Gas y Tratamiento de Agua y Generación de Energía',
                'tipo_ocupacion_id' => 10,
            ),
            490 => 
            array (
                'id' => 491,
                'nombre' => 'Supervisores de Procesamiento de Alimentos, Bebidas y Tabaco',
                'tipo_ocupacion_id' => 10,
            ),
            491 => 
            array (
                'id' => 492,
                'nombre' => 'Supervisores de Fabricación de Productos de Plástico y Caucho',
                'tipo_ocupacion_id' => 10,
            ),
            492 => 
            array (
                'id' => 493,
                'nombre' => 'Supervisores de Procesamiento de la Madera y Producción de Pulpa y Papel',
                'tipo_ocupacion_id' => 10,
            ),
            493 => 
            array (
                'id' => 494,
                'nombre' => 'Supervisores de Procesamiento Textil',
                'tipo_ocupacion_id' => 10,
            ),
            494 => 
            array (
                'id' => 495,
                'nombre' => 'Inspectores de Control de Calidad, Procesamiento de Alimentos y Bebidas',
                'tipo_ocupacion_id' => 10,
            ),
            495 => 
            array (
                'id' => 496,
                'nombre' => 'Supervisores de Ensamble de Vehículos de Motor',
                'tipo_ocupacion_id' => 10,
            ),
            496 => 
            array (
                'id' => 497,
                'nombre' => 'Supervisores de Fabricación de Productos Electrónicos',
                'tipo_ocupacion_id' => 10,
            ),
            497 => 
            array (
                'id' => 498,
                'nombre' => 'Supervisores de Fabricación de Productos Eléctricos',
                'tipo_ocupacion_id' => 10,
            ),
            498 => 
            array (
                'id' => 499,
                'nombre' => 'Supervisores de Fabricación de Muebles y Accesorios',
                'tipo_ocupacion_id' => 10,
            ),
            499 => 
            array (
                'id' => 500,
                'nombre' => 'Supervisores de Fabricación de Productos de Tela, Cuero y Piel',
                'tipo_ocupacion_id' => 10,
            ),
        ));
        DB::table('ocupacion')->insert(array (
            0 => 
            array (
                'id' => 501,
                'nombre' => 'Supervisores de Impresión y Ocupaciones Relacionadas',
                'tipo_ocupacion_id' => 10,
            ),
            1 => 
            array (
                'id' => 502,
                'nombre' => 'Supervisores de Fabricación de Otros Productos Mecánicos y Metálicos',
                'tipo_ocupacion_id' => 10,
            ),
            2 => 
            array (
                'id' => 503,
                'nombre' => 'Supervisores de Fabricación y Ensamble de Otros Productos n.c.a',
                'tipo_ocupacion_id' => 10,
            ),
            3 => 
            array (
                'id' => 504,
                'nombre' => 'Operadores de Control Central de Procesos, Tratamiento de Metales y Minerales',
                'tipo_ocupacion_id' => 10,
            ),
            4 => 
            array (
                'id' => 505,
                'nombre' => 'Operadores de Procesos, Químicos, Gas y Petróleo',
                'tipo_ocupacion_id' => 10,
            ),
            5 => 
            array (
                'id' => 506,
                'nombre' => 'Operadores de Control de Procesos, Producción de Pulpa',
                'tipo_ocupacion_id' => 10,
            ),
            6 => 
            array (
                'id' => 507,
                'nombre' => 'Operadores de Control de Procesos, Fabricación de Papel',
                'tipo_ocupacion_id' => 10,
            ),
            7 => 
            array (
                'id' => 508,
                'nombre' => 'Impresores de Artes Gráficas',
                'tipo_ocupacion_id' => 10,
            ),
            8 => 
            array (
                'id' => 509,
                'nombre' => 'Pre-prensistas de Artes Gráficas',
                'tipo_ocupacion_id' => 10,
            ),
            9 => 
            array (
                'id' => 510,
                'nombre' => 'Operarios de Terminados y Acabados de Artes Gráficas',
                'tipo_ocupacion_id' => 10,
            ),
            10 => 
            array (
                'id' => 511,
                'nombre' => 'Operadores de Máquinas, Tratamiento de Metales y Minerales',
                'tipo_ocupacion_id' => 10,
            ),
            11 => 
            array (
                'id' => 512,
                'nombre' => 'Trabajadores de Fundición',
                'tipo_ocupacion_id' => 10,
            ),
            12 => 
            array (
                'id' => 513,
                'nombre' => 'Operadores de Fabricación, Moldeo y Acabado del Vidrio',
                'tipo_ocupacion_id' => 10,
            ),
            13 => 
            array (
                'id' => 514,
                'nombre' => 'Operadores de Moldeo de Arcilla, Piedra y Concreto',
                'tipo_ocupacion_id' => 10,
            ),
            14 => 
            array (
                'id' => 515,
                'nombre' => 'Inspectores de Control de Calidad, Tratamiento de Metales y Minerales',
                'tipo_ocupacion_id' => 10,
            ),
            15 => 
            array (
                'id' => 516,
                'nombre' => 'Operadores de Máquinas de Planta Química',
                'tipo_ocupacion_id' => 10,
            ),
            16 => 
            array (
                'id' => 517,
                'nombre' => 'Operadores de Máquinas para Procesamiento de Plásticos',
                'tipo_ocupacion_id' => 10,
            ),
            17 => 
            array (
                'id' => 518,
                'nombre' => 'Operadores de Máquinas y Trabajadores Relacionados con el Procesamiento del Caucho',
                'tipo_ocupacion_id' => 10,
            ),
            18 => 
            array (
                'id' => 519,
                'nombre' => 'Operadores de Plantas de Tratamiento de Aguas y Desechos',
                'tipo_ocupacion_id' => 10,
            ),
            19 => 
            array (
                'id' => 520,
                'nombre' => 'Operadores de Máquinas para Procesamiento de la Madera',
                'tipo_ocupacion_id' => 10,
            ),
            20 => 
            array (
                'id' => 521,
                'nombre' => 'Operadores de Máquinas para la Producción de Pulpa',
                'tipo_ocupacion_id' => 10,
            ),
            21 => 
            array (
                'id' => 522,
                'nombre' => 'Operadores de Máquinas para la Fabricación de Papel',
                'tipo_ocupacion_id' => 10,
            ),
            22 => 
            array (
                'id' => 523,
                'nombre' => 'Operadores de Máquinas para la Fabricación de Productos de Papel',
                'tipo_ocupacion_id' => 10,
            ),
            23 => 
            array (
                'id' => 524,
                'nombre' => 'Inspectores de Control de Calidad, Procesamiento de la Madera',
                'tipo_ocupacion_id' => 10,
            ),
            24 => 
            array (
                'id' => 525,
                'nombre' => 'Operadores de Máquinas para la Preparación de Fibras Textiles',
                'tipo_ocupacion_id' => 10,
            ),
            25 => 
            array (
                'id' => 526,
                'nombre' => 'Operadores de Telares y Otras Máquinas Tejedoras',
                'tipo_ocupacion_id' => 10,
            ),
            26 => 
            array (
                'id' => 527,
                'nombre' => 'Operadores de Máquinas de Tintura, Acabado Textil y Prendas',
                'tipo_ocupacion_id' => 10,
            ),
            27 => 
            array (
                'id' => 528,
                'nombre' => 'Analistas de Calidad, Textiles',
                'tipo_ocupacion_id' => 10,
            ),
            28 => 
            array (
                'id' => 529,
                'nombre' => 'Operadores de Máquinas para Coser y Bordar',
                'tipo_ocupacion_id' => 10,
            ),
            29 => 
            array (
                'id' => 530,
                'nombre' => 'Cortadores de Tela, Cuero y Piel',
                'tipo_ocupacion_id' => 10,
            ),
            30 => 
            array (
                'id' => 531,
                'nombre' => 'Operadores de Máquinas y Trabajadores Relacionados con la Fabricación de Calzado y Marroquinería',
                'tipo_ocupacion_id' => 10,
            ),
            31 => 
            array (
                'id' => 532,
                'nombre' => 'Trabajadores del Tratamiento de Pieles y Cueros',
                'tipo_ocupacion_id' => 10,
            ),
            32 => 
            array (
                'id' => 533,
                'nombre' => 'Inspectores de Control de Calidad, Fabricación de Productos de Tela, Piel y Cuero',
                'tipo_ocupacion_id' => 10,
            ),
            33 => 
            array (
                'id' => 534,
                'nombre' => 'Operadores de Control de Procesos y Máquinas para la Elaboración de Alimentos y Bebidas',
                'tipo_ocupacion_id' => 10,
            ),
            34 => 
            array (
                'id' => 535,
                'nombre' => 'Operarios de Planta de Beneficio Animal',
                'tipo_ocupacion_id' => 10,
            ),
            35 => 
            array (
                'id' => 536,
                'nombre' => 'Operarios de Planta de Procesamiento y Empaque de Pescado y Mariscos',
                'tipo_ocupacion_id' => 10,
            ),
            36 => 
            array (
                'id' => 537,
                'nombre' => 'Operarios de Máquinas para la Elaboración de Productos de Tabaco',
                'tipo_ocupacion_id' => 10,
            ),
            37 => 
            array (
                'id' => 538,
                'nombre' => 'Procesadores Fotográficos y de Películas',
                'tipo_ocupacion_id' => 10,
            ),
            38 => 
            array (
                'id' => 539,
                'nombre' => 'Ensambladores e Inspectores de Vehículos Automotores',
                'tipo_ocupacion_id' => 10,
            ),
            39 => 
            array (
                'id' => 540,
                'nombre' => 'Ensambladores de productos Electrónicos',
                'tipo_ocupacion_id' => 10,
            ),
            40 => 
            array (
                'id' => 541,
                'nombre' => 'Ensambladores e Inspectores de Aparatos y Equipo Eléctrico',
                'tipo_ocupacion_id' => 10,
            ),
            41 => 
            array (
                'id' => 542,
                'nombre' => 'Ensambladores, Fabricantes e Inspectores de Transformadores y Motores Eléctricos Industriales',
                'tipo_ocupacion_id' => 10,
            ),
            42 => 
            array (
                'id' => 543,
                'nombre' => 'Ensambladores e Inspectores de Productos Mecánicos',
                'tipo_ocupacion_id' => 10,
            ),
            43 => 
            array (
                'id' => 544,
                'nombre' => 'Ensambladores e Inspectores de Ensamble de Aeronaves',
                'tipo_ocupacion_id' => 10,
            ),
            44 => 
            array (
                'id' => 545,
                'nombre' => 'Operadores de Máquinas e Inspectores de la Fabricación de Productos y Componentes Eléctricos',
                'tipo_ocupacion_id' => 10,
            ),
            45 => 
            array (
                'id' => 546,
                'nombre' => 'Ensambladores e Inspectores de Embarcaciones',
                'tipo_ocupacion_id' => 10,
            ),
            46 => 
            array (
                'id' => 547,
                'nombre' => 'Ensambladores e Inspectores de Muebles y Accesorios',
                'tipo_ocupacion_id' => 10,
            ),
            47 => 
            array (
                'id' => 548,
                'nombre' => 'Operarios de Acabado de Muebles',
                'tipo_ocupacion_id' => 10,
            ),
            48 => 
            array (
                'id' => 549,
                'nombre' => 'Ensambladores de Productos Plásticos e Inspectores',
                'tipo_ocupacion_id' => 10,
            ),
            49 => 
            array (
                'id' => 550,
                'nombre' => 'Operarios de Recubrimientos Metálicos',
                'tipo_ocupacion_id' => 10,
            ),
            50 => 
            array (
                'id' => 551,
                'nombre' => 'Pintores en Procesos de Manufactura',
                'tipo_ocupacion_id' => 10,
            ),
            51 => 
            array (
                'id' => 552,
                'nombre' => 'Otros Ensambladores e Inspectores n.c.a.',
                'tipo_ocupacion_id' => 10,
            ),
            52 => 
            array (
                'id' => 553,
                'nombre' => 'Auxiliares de Producción Gráfica',
                'tipo_ocupacion_id' => 10,
            ),
            53 => 
            array (
                'id' => 554,
                'nombre' => 'Operadores de Máquinas Herramientas',
                'tipo_ocupacion_id' => 10,
            ),
            54 => 
            array (
                'id' => 555,
                'nombre' => 'Operadores de Máquinas para el Trabajo de la Madera',
                'tipo_ocupacion_id' => 10,
            ),
            55 => 
            array (
                'id' => 556,
                'nombre' => 'Operadores de Máquinas para el Trabajo del Metal',
                'tipo_ocupacion_id' => 10,
            ),
            56 => 
            array (
                'id' => 557,
                'nombre' => 'Operadores de Máquinas para Forja',
                'tipo_ocupacion_id' => 10,
            ),
            57 => 
            array (
                'id' => 558,
                'nombre' => 'Operadores de Máquinas de Soldadura',
                'tipo_ocupacion_id' => 10,
            ),
            58 => 
            array (
                'id' => 559,
            'nombre' => 'Operadores de Máquinas para la Fabricación de Otros Productos Metálicos (n.c.a)',
                'tipo_ocupacion_id' => 10,
            ),
            59 => 
            array (
                'id' => 560,
                'nombre' => 'Operadores de Máquinas para la fabricación de Otros Productos n.c.a.',
                'tipo_ocupacion_id' => 10,
            ),
            60 => 
            array (
                'id' => 561,
                'nombre' => 'Obreros y Ayudantes en el Tratamiento de Metales y Minerales',
                'tipo_ocupacion_id' => 10,
            ),
            61 => 
            array (
                'id' => 562,
                'nombre' => 'Ayudantes en la Fabricación Metálica',
                'tipo_ocupacion_id' => 10,
            ),
            62 => 
            array (
                'id' => 563,
                'nombre' => 'Obreros y Ayudantes de Planta Química',
                'tipo_ocupacion_id' => 10,
            ),
            63 => 
            array (
                'id' => 564,
                'nombre' => 'Obreros y Ayudantes en el Procesamiento de la Madera y Producción de Pulpa y Papel',
                'tipo_ocupacion_id' => 10,
            ),
            64 => 
            array (
                'id' => 565,
                'nombre' => 'Obreros y Ayudantes en la Elaboración de Alimentos y Bebidas',
                'tipo_ocupacion_id' => 10,
            ),
            65 => 
            array (
                'id' => 566,
                'nombre' => 'Otros Obreros y Ayudantes en Fabricación y Procesamiento n.c.a.',
                'tipo_ocupacion_id' => 10,
            ),
        ));
        
        
    }
}