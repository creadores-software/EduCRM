<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CampoEducacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('campo_educacion')->delete();
        
        DB::table('campo_educacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'categoria_campo_educacion_id' => 1,
                'nombre' => 'Programas y certificaciones básicas',
            ),
            1 => 
            array (
                'id' => 2,
                'categoria_campo_educacion_id' => 1,
                'nombre' => 'Alfabetización y aritmética elemental',
            ),
            2 => 
            array (
                'id' => 3,
                'categoria_campo_educacion_id' => 1,
                'nombre' => 'Competencias personales y desarrollo',
            ),
            3 => 
            array (
                'id' => 4,
                'categoria_campo_educacion_id' => 2,
                'nombre' => 'Ciencias de la educación',
            ),
            4 => 
            array (
                'id' => 5,
                'categoria_campo_educacion_id' => 2,
                'nombre' => 'Formación para docentes de educación pre-primaría',
            ),
            5 => 
            array (
                'id' => 6,
                'categoria_campo_educacion_id' => 2,
                'nombre' => 'Formación para docentes sin asignatura de especialización',
            ),
            6 => 
            array (
                'id' => 7,
                'categoria_campo_educacion_id' => 2,
                'nombre' => 'Formación para docentes con asignatura de especialización',
            ),
            7 => 
            array (
                'id' => 8,
                'categoria_campo_educacion_id' => 2,
                'nombre' => 'Educación no clasificada en otra parte',
            ),
            8 => 
            array (
                'id' => 9,
                'categoria_campo_educacion_id' => 2,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a educación',
            ),
            9 => 
            array (
                'id' => 10,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Técnicas audiovisuales y producción para medios de comunicación',
            ),
            10 => 
            array (
                'id' => 11,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Diseño industrial, de moda e interiores',
            ),
            11 => 
            array (
                'id' => 12,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Bellas artes',
            ),
            12 => 
            array (
                'id' => 13,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Artesanías',
            ),
            13 => 
            array (
                'id' => 14,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Música y artes escénicas',
            ),
            14 => 
            array (
                'id' => 15,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Artes no clasificadas en otra parte',
            ),
            15 => 
            array (
                'id' => 16,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Religión y Teología',
            ),
            16 => 
            array (
                'id' => 17,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Historia y arqueología',
            ),
            17 => 
            array (
                'id' => 18,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Filosofía y ética',
            ),
            18 => 
            array (
                'id' => 19,
                'categoria_campo_educacion_id' => 3,
            'nombre' => 'Humanidades (excepto idiomas) no clasificados en otra parte',
            ),
            19 => 
            array (
                'id' => 20,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Adquisición del lenguaje',
            ),
            20 => 
            array (
                'id' => 21,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Literatura y lingüística',
            ),
            21 => 
            array (
                'id' => 22,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Idiomas no clasificados en otra parte',
            ),
            22 => 
            array (
                'id' => 23,
                'categoria_campo_educacion_id' => 3,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a artes y humanidades',
            ),
            23 => 
            array (
                'id' => 24,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Economía',
            ),
            24 => 
            array (
                'id' => 25,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Ciencias políticas y educación cívica',
            ),
            25 => 
            array (
                'id' => 26,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Psicología',
            ),
            26 => 
            array (
                'id' => 27,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Sociología, Antropología y estudios culturales',
            ),
            27 => 
            array (
                'id' => 28,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Trabajo social',
            ),
            28 => 
            array (
                'id' => 29,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Ciencias sociales y del comportamiento no clasificadas en otra parte',
            ),
            29 => 
            array (
                'id' => 30,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Periodismo, comunicación y reportajes',
            ),
            30 => 
            array (
                'id' => 31,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Bibliotecología, información y archivología',
            ),
            31 => 
            array (
                'id' => 32,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Periodismo e información no clasificados en otra parte',
            ),
            32 => 
            array (
                'id' => 33,
                'categoria_campo_educacion_id' => 4,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a ciencias sociales, periodismo e información',
            ),
            33 => 
            array (
                'id' => 34,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Contabilidad e impuestos',
            ),
            34 => 
            array (
                'id' => 35,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Gestión financiera, administración bancaria y seguros',
            ),
            35 => 
            array (
                'id' => 36,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Gestión y administración',
            ),
            36 => 
            array (
                'id' => 37,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Mercadotecnia y publicidad',
            ),
            37 => 
            array (
                'id' => 38,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Secretariado y trabajo de oficina',
            ),
            38 => 
            array (
                'id' => 39,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Ventas al por mayor y al por menor',
            ),
            39 => 
            array (
                'id' => 40,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Competencias laborales',
            ),
            40 => 
            array (
                'id' => 41,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Educación comercial y administración no clasificados en otra parte',
            ),
            41 => 
            array (
                'id' => 42,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Derecho',
            ),
            42 => 
            array (
                'id' => 43,
                'categoria_campo_educacion_id' => 5,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a administración de empresas y derecho',
            ),
            43 => 
            array (
                'id' => 44,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Biología',
            ),
            44 => 
            array (
                'id' => 45,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Bioquímica',
            ),
            45 => 
            array (
                'id' => 46,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Ciencias biológicas y afines no clasificados en otra parte',
            ),
            46 => 
            array (
                'id' => 47,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Ciencias del medio ambiente',
            ),
            47 => 
            array (
                'id' => 48,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Medio ambiente natural y vida silvestre',
            ),
            48 => 
            array (
                'id' => 49,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Medio ambiente no clasificados en otra parte',
            ),
            49 => 
            array (
                'id' => 50,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Química',
            ),
            50 => 
            array (
                'id' => 51,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Ciencias de la tierra',
            ),
            51 => 
            array (
                'id' => 52,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Física',
            ),
            52 => 
            array (
                'id' => 53,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Ciencias físicas no clasificadas en otra parte',
            ),
            53 => 
            array (
                'id' => 54,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Matemáticas',
            ),
            54 => 
            array (
                'id' => 55,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Estadística',
            ),
            55 => 
            array (
                'id' => 56,
                'categoria_campo_educacion_id' => 6,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a ciencias naturales, matemáticas y estadística',
            ),
            56 => 
            array (
                'id' => 57,
                'categoria_campo_educacion_id' => 7,
                'nombre' => 'Uso de computadores',
            ),
            57 => 
            array (
                'id' => 58,
                'categoria_campo_educacion_id' => 7,
                'nombre' => 'Diseño y administración de redes y bases de datos',
            ),
            58 => 
            array (
                'id' => 59,
                'categoria_campo_educacion_id' => 7,
                'nombre' => 'Desarrollo y análisis de software y aplicaciones',
            ),
            59 => 
            array (
                'id' => 60,
                'categoria_campo_educacion_id' => 7,
            'nombre' => 'Tecnologías de la información y la comunicación (TIC) no clasificada en otra parte',
            ),
            60 => 
            array (
                'id' => 61,
                'categoria_campo_educacion_id' => 7,
            'nombre' => 'Programas y certificaciones interdisciplinarios relativos a tecnologías de la información y la comunicación (TIC)',
            ),
            61 => 
            array (
                'id' => 62,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Ingeniería y procesos químicos',
            ),
            62 => 
            array (
                'id' => 63,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Tecnología de protección del medio ambiente',
            ),
            63 => 
            array (
                'id' => 64,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Electricidad y energía',
            ),
            64 => 
            array (
                'id' => 65,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Electrónica y automatización',
            ),
            65 => 
            array (
                'id' => 66,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Mecánica y profesiones afines a la metalistería',
            ),
            66 => 
            array (
                'id' => 67,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Vehículos, barcos y aeronaves de motor',
            ),
            67 => 
            array (
                'id' => 68,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Ingeniería y profesiones afines no clasificadas en otra parte',
            ),
            68 => 
            array (
                'id' => 69,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Procesamiento de alimentos',
            ),
            69 => 
            array (
                'id' => 70,
                'categoria_campo_educacion_id' => 8,
            'nombre' => 'Materiales (vidrio, papel, plástico y madera)',
            ),
            70 => 
            array (
                'id' => 71,
                'categoria_campo_educacion_id' => 8,
            'nombre' => 'Producción textiles (ropa, calzado y artículos de cuero)',
            ),
            71 => 
            array (
                'id' => 72,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Minería y extracción',
            ),
            72 => 
            array (
                'id' => 73,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Industria y procesamiento no clasificados en otra parte',
            ),
            73 => 
            array (
                'id' => 74,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Arquitectura y urbanismo',
            ),
            74 => 
            array (
                'id' => 75,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Construcción e ingeniería civil',
            ),
            75 => 
            array (
                'id' => 76,
                'categoria_campo_educacion_id' => 8,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a ingeniería, industria y construcción',
            ),
            76 => 
            array (
                'id' => 77,
                'categoria_campo_educacion_id' => 9,
                'nombre' => 'Producción agrícola y ganadera',
            ),
            77 => 
            array (
                'id' => 78,
                'categoria_campo_educacion_id' => 9,
            'nombre' => 'Horticultura (Técnicas de huertas, invernaderos, viveros y jardines)',
            ),
            78 => 
            array (
                'id' => 79,
                'categoria_campo_educacion_id' => 9,
                'nombre' => 'Agropecuario no clasificado en otra parte',
            ),
            79 => 
            array (
                'id' => 80,
                'categoria_campo_educacion_id' => 9,
                'nombre' => 'Silvicultura',
            ),
            80 => 
            array (
                'id' => 81,
                'categoria_campo_educacion_id' => 9,
                'nombre' => 'Pesca',
            ),
            81 => 
            array (
                'id' => 82,
                'categoria_campo_educacion_id' => 9,
                'nombre' => 'Veterinaria',
            ),
            82 => 
            array (
                'id' => 83,
                'categoria_campo_educacion_id' => 9,
                'nombre' => 'Programas y certificaciones interdisciplinarias relativos a agropecuario, silvicultura, pesca y veterinaria',
            ),
            83 => 
            array (
                'id' => 84,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Odontología y estudios dentales',
            ),
            84 => 
            array (
                'id' => 85,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Medicina',
            ),
            85 => 
            array (
                'id' => 86,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Enfermería y partería',
            ),
            86 => 
            array (
                'id' => 87,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Tecnología de diagnóstico y tratamiento médico',
            ),
            87 => 
            array (
                'id' => 88,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Fisioterapia, Fonoaudiología, Terapia ocupacional, Nutrición y afines',
            ),
            88 => 
            array (
                'id' => 89,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Farmacia',
            ),
            89 => 
            array (
                'id' => 90,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Medicina y terapia tradicional y complementaria',
            ),
            90 => 
            array (
                'id' => 91,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Instrumentación quirúrgica',
            ),
            91 => 
            array (
                'id' => 92,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Salud no clasificada en otra parte',
            ),
            92 => 
            array (
                'id' => 93,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Atención a adultos, adultos mayores con o sin discapacitados',
            ),
            93 => 
            array (
                'id' => 94,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Atención, protección y servicios a la infancia, adolescencia y juventud',
            ),
            94 => 
            array (
                'id' => 95,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Bienestar no clasificado en otra parte',
            ),
            95 => 
            array (
                'id' => 96,
                'categoria_campo_educacion_id' => 10,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a salud y bienestar',
            ),
            96 => 
            array (
                'id' => 97,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Servicios domésticos',
            ),
            97 => 
            array (
                'id' => 98,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Peluquería y tratamientos de belleza',
            ),
            98 => 
            array (
                'id' => 99,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Hotelería, restaurantes y servicios de banquetes',
            ),
            99 => 
            array (
                'id' => 100,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Deportes',
            ),
            100 => 
            array (
                'id' => 101,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Viajes, turismo y actividades recreativas',
            ),
            101 => 
            array (
                'id' => 102,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Servicios funerarios',
            ),
            102 => 
            array (
                'id' => 103,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Servicios personales no clasificados en otra parte',
            ),
            103 => 
            array (
                'id' => 104,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Saneamiento de la comunidad',
            ),
            104 => 
            array (
                'id' => 105,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Salud y protección laboral',
            ),
            105 => 
            array (
                'id' => 106,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Servicios de higiene y salud ocupacional no clasificadas en otra parte',
            ),
            106 => 
            array (
                'id' => 107,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Educación militar y de defensa',
            ),
            107 => 
            array (
                'id' => 108,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Protección de las personas y de la propiedad',
            ),
            108 => 
            array (
                'id' => 109,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Servicios de seguridad no clasificados en otra parte',
            ),
            109 => 
            array (
                'id' => 110,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Servicios de transporte',
            ),
            110 => 
            array (
                'id' => 111,
                'categoria_campo_educacion_id' => 11,
                'nombre' => 'Programas y certificaciones interdisciplinarios relativos a servicios',
            ),
        ));
        
        
    }
}