<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ActividadEconomicaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('actividad_economica')->delete();
        
        DB::table('actividad_economica')->insert(array (
            0 => 
            array (
                'id' => 1,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Cultivos agrícolas transitorios',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Cultivos agrícolas permanentes',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'categoria_actividad_economica_id' => 1,
            'nombre' => 'Propagación de plantas (actividades de los viveros, excepto viveros forestales)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Ganadería',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'categoria_actividad_economica_id' => 1,
            'nombre' => 'Explotación mixta (agrícola y pecuaria)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Actividades de apoyo a la agricultura y la ganadería, y actividades posteriores a la cosecha',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Caza ordinaria y mediante trampas y actividades de servicios conexas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Silvicultura y otras actividades forestales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Extracción de madera',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Recolección de productos forestales diferentes a la madera',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Servicios de apoyo a la silvicultura',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Pesca',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'categoria_actividad_economica_id' => 1,
                'nombre' => 'Acuicultura',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'categoria_actividad_economica_id' => 2,
            'nombre' => 'Extracción de hulla (carbón de piedra)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de carbón lignito',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de petróleo crudo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de gas natural',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de minerales de hierro',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de minerales metalíferos no ferrosos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de piedra, arena, arcillas, cal, yeso, caolín, bentonitas y similares',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de esmeraldas, piedras preciosas y semipreciosas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Extracción de otros minerales no metálicos n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Actividades de apoyo para la extracción de petróleo y de gas natural',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'categoria_actividad_economica_id' => 2,
                'nombre' => 'Actividades de apoyo para otras actividades de explotación de minas y canteras',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Procesamiento y conservación de carne, pescado, crustáceos y moluscos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            25 => 
            array (
                'id' => 26,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            26 => 
            array (
                'id' => 27,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de aceites y grasas de origen vegetal y animal',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            27 => 
            array (
                'id' => 28,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de productos lácteos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            28 => 
            array (
                'id' => 29,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de productos de molinería, almidones y productos derivados del almidón',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            29 => 
            array (
                'id' => 30,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de productos de café',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            30 => 
            array (
                'id' => 31,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de azúcar y panela',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            31 => 
            array (
                'id' => 32,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de otros productos alimenticios',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            32 => 
            array (
                'id' => 33,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de alimentos preparados para animales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            33 => 
            array (
                'id' => 34,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de bebidas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            34 => 
            array (
                'id' => 35,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Elaboración de productos de tabaco',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            35 => 
            array (
                'id' => 36,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Preparación, hilatura, tejeduría y acabado de productos textiles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            36 => 
            array (
                'id' => 37,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de otros productos textiles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            37 => 
            array (
                'id' => 38,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Confección de prendas de vestir, excepto prendas de piel',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            38 => 
            array (
                'id' => 39,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de artículos de piel',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            39 => 
            array (
                'id' => 40,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de artículos de punto y ganchillo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            40 => 
            array (
                'id' => 41,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Curtido de cueros; fabricación de artículos de viaje, de talabartería y guarnicionería; bolsos de mano y artículos similares; adobo y teñido de pieles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            41 => 
            array (
                'id' => 42,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de calzado',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            42 => 
            array (
                'id' => 43,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Aserrado, acepillado e impregnación de la madera',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            43 => 
            array (
                'id' => 44,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de hojas de madera para enchapado; fabricación de tableros contrachapados, tableros laminados, tableros de partículas y otros paneles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            44 => 
            array (
                'id' => 45,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de partes y piezas de madera, de carpintería y ebanistería para la construcción',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            45 => 
            array (
                'id' => 46,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de recipientes de madera',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            46 => 
            array (
                'id' => 47,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de otros productos de madera; fabricación de artículos de corcho, cestería y espartería',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            47 => 
            array (
                'id' => 48,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de papel, cartón y productos de papel y cartón',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            48 => 
            array (
                'id' => 49,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Actividades de impresión y actividades de servicios relacionados con la impresión',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            49 => 
            array (
                'id' => 50,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Producción de copias a partir de grabaciones originales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            50 => 
            array (
                'id' => 51,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos de hornos de coque',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            51 => 
            array (
                'id' => 52,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos de la refinación del petróleo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            52 => 
            array (
                'id' => 53,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de sustancias químicas básicas, abonos y compuestos inorgánicos nitrogenados, plásticos y caucho sintético en formas primarias',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            53 => 
            array (
                'id' => 54,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de otros productos químicos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            54 => 
            array (
                'id' => 55,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de fibras sintéticas y artificiales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            55 => 
            array (
                'id' => 56,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos de uso farmacéutico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            56 => 
            array (
                'id' => 57,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos de caucho',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            57 => 
            array (
                'id' => 58,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos de plástico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            58 => 
            array (
                'id' => 59,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de vidrio y productos de vidrio',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            59 => 
            array (
                'id' => 60,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos minerales no metálicos n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            60 => 
            array (
                'id' => 61,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Industrias básicas de hierro y de acero',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            61 => 
            array (
                'id' => 62,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Industrias básicas de metales preciosos y de metales no ferrosos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            62 => 
            array (
                'id' => 63,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fundición de metales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            63 => 
            array (
                'id' => 64,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de productos metálicos para uso estructural, tanques, depósitos y generadores de vapor',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            64 => 
            array (
                'id' => 65,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de armas y municiones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            65 => 
            array (
                'id' => 66,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de otros productos elaborados de metal y actividades de servicios relacionadas con el trabajo de metales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            66 => 
            array (
                'id' => 67,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de componentes y tableros electrónicos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            67 => 
            array (
                'id' => 68,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de computadoras y de equipo periférico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            68 => 
            array (
                'id' => 69,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de equipos de comunicación',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            69 => 
            array (
                'id' => 70,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de aparatos electrónicos de consumo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            70 => 
            array (
                'id' => 71,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de equipo de medición, prueba, navegación y control; fabricación de relojes',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            71 => 
            array (
                'id' => 72,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de equipo de irradiación y equipo electrónico de uso médico y terapéutico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            72 => 
            array (
                'id' => 73,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de instrumentos ópticos y equipo fotográfico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            73 => 
            array (
                'id' => 74,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de medios magnéticos y ópticos para almacenamiento de datos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            74 => 
            array (
                'id' => 75,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de motores, generadores y transformadores eléctricos y de aparatos de distribución y control de la energía eléctrica',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            75 => 
            array (
                'id' => 76,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de pilas, baterías y acumuladores eléctricos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            76 => 
            array (
                'id' => 77,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de hilos y cables aislados y sus dispositivos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            77 => 
            array (
                'id' => 78,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de equipos eléctricos de iluminación',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            78 => 
            array (
                'id' => 79,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de aparatos de uso doméstico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            79 => 
            array (
                'id' => 80,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de otros tipos de equipo eléctrico n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            80 => 
            array (
                'id' => 81,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de maquinaria y equipo de uso general',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            81 => 
            array (
                'id' => 82,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de maquinaria y equipo de uso especial',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            82 => 
            array (
                'id' => 83,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de vehículos automotores y sus motores',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            83 => 
            array (
                'id' => 84,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de carrocerías para vehículos automotores; fabricación de remolques y semirremolques',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            84 => 
            array (
                'id' => 85,
                'categoria_actividad_economica_id' => 3,
            'nombre' => 'Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            85 => 
            array (
                'id' => 86,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Construcción de barcos y otras embarcaciones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            86 => 
            array (
                'id' => 87,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de locomotoras y de material rodante para ferrocarriles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            87 => 
            array (
                'id' => 88,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de aeronaves, naves espaciales y de maquinaria conexa',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            88 => 
            array (
                'id' => 89,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de vehículos militares de combate',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            89 => 
            array (
                'id' => 90,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de otros tipos de equipo de transporte n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            90 => 
            array (
                'id' => 91,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de muebles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            91 => 
            array (
                'id' => 92,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de colchones y somieres',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            92 => 
            array (
                'id' => 93,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de joyas, bisutería y artículos conexos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            93 => 
            array (
                'id' => 94,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de instrumentos musicales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            94 => 
            array (
                'id' => 95,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de artículos y equipo para la práctica del deporte',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            95 => 
            array (
                'id' => 96,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Fabricación de juegos, juguetes y rompecabezas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            96 => 
            array (
                'id' => 97,
                'categoria_actividad_economica_id' => 3,
            'nombre' => 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            97 => 
            array (
                'id' => 98,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Otras industrias manufactureras n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            98 => 
            array (
                'id' => 99,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Mantenimiento y reparación especializado de productos elaborados en metal y de maquinaria y equipo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            99 => 
            array (
                'id' => 100,
                'categoria_actividad_economica_id' => 3,
                'nombre' => 'Instalación especializada de maquinaria y equipo industrial',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            100 => 
            array (
                'id' => 101,
                'categoria_actividad_economica_id' => 4,
                'nombre' => 'Generación, transmisión, distribución y comercialización de energía eléctrica',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            101 => 
            array (
                'id' => 102,
                'categoria_actividad_economica_id' => 4,
                'nombre' => 'Producción de gas; distribución de combustibles gaseosos por tuberías',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            102 => 
            array (
                'id' => 103,
                'categoria_actividad_economica_id' => 4,
                'nombre' => 'Suministro de vapor y aire acondicionado',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            103 => 
            array (
                'id' => 104,
                'categoria_actividad_economica_id' => 5,
                'nombre' => 'Captación, tratamiento y distribución de agua',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            104 => 
            array (
                'id' => 105,
                'categoria_actividad_economica_id' => 5,
                'nombre' => 'Evacuación y tratamiento de aguas residuales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            105 => 
            array (
                'id' => 106,
                'categoria_actividad_economica_id' => 5,
                'nombre' => 'Recolección de desechos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            106 => 
            array (
                'id' => 107,
                'categoria_actividad_economica_id' => 5,
                'nombre' => 'Tratamiento y disposición de desechos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            107 => 
            array (
                'id' => 108,
                'categoria_actividad_economica_id' => 5,
                'nombre' => 'Recuperación de materiales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            108 => 
            array (
                'id' => 109,
                'categoria_actividad_economica_id' => 5,
                'nombre' => 'Actividades de saneamiento ambiental y otros servicios de gestión de desechos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            109 => 
            array (
                'id' => 110,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Construcción de edificios',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            110 => 
            array (
                'id' => 111,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Construcción de carreteras y vías de ferrocarril',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            111 => 
            array (
                'id' => 112,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Construcción de proyectos de servicio público',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            112 => 
            array (
                'id' => 113,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Construcción de otras obras de ingeniería civil',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            113 => 
            array (
                'id' => 114,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Demolición y preparación del terreno',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            114 => 
            array (
                'id' => 115,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Instalaciones eléctricas, de fontanería y otras instalaciones especializadas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            115 => 
            array (
                'id' => 116,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Terminación y acabado de edificios y obras de ingeniería civil',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            116 => 
            array (
                'id' => 117,
                'categoria_actividad_economica_id' => 6,
                'nombre' => 'Otras actividades especializadas para la construcción de edificios y obras de ingeniería civil',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            117 => 
            array (
                'id' => 118,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio de vehículos automotores',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            118 => 
            array (
                'id' => 119,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Mantenimiento y reparación de vehículos automotores',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            119 => 
            array (
                'id' => 120,
                'categoria_actividad_economica_id' => 7,
            'nombre' => 'Comercio de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            120 => 
            array (
                'id' => 121,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio, mantenimiento y reparación de motocicletas y de sus partes, piezas y accesorios',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            121 => 
            array (
                'id' => 122,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por mayor a cambio de una retribución o por contrata',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            122 => 
            array (
                'id' => 123,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por mayor de materias primas agropecuarias; animales vivos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            123 => 
            array (
                'id' => 124,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por mayor de alimentos, bebidas y tabaco',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            124 => 
            array (
                'id' => 125,
                'categoria_actividad_economica_id' => 7,
            'nombre' => 'Comercio al por mayor de artículos y enseres domésticos (incluidas prendas de vestir)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            125 => 
            array (
                'id' => 126,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por mayor de maquinaria y equipo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            126 => 
            array (
                'id' => 127,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por mayor especializado de otros productos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            127 => 
            array (
                'id' => 128,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por mayor no especializado',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            128 => 
            array (
                'id' => 129,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor en establecimientos no especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            129 => 
            array (
                'id' => 130,
                'categoria_actividad_economica_id' => 7,
            'nombre' => 'Comercio al por menor de alimentos (víveres en general), bebidas y tabaco, en establecimientos especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            130 => 
            array (
                'id' => 131,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor de combustible, lubricantes, aditivos y productos de limpieza para automotores, en establecimientos especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            131 => 
            array (
                'id' => 132,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor de equipos de informática y de comunicaciones en establecimientos especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            132 => 
            array (
                'id' => 133,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor de otros enseres domésticos en establecimientos especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            133 => 
            array (
                'id' => 134,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor de artículos culturales y de entretenimiento en establecimientos especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            134 => 
            array (
                'id' => 135,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor de otros productos en establecimientos especializados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            135 => 
            array (
                'id' => 136,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor en puestos de venta móviles',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            136 => 
            array (
                'id' => 137,
                'categoria_actividad_economica_id' => 7,
                'nombre' => 'Comercio al por menor no realizado en establecimientos, puestos de venta o mercados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            137 => 
            array (
                'id' => 138,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte férreo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            138 => 
            array (
                'id' => 139,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte terrestre público automotor',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            139 => 
            array (
                'id' => 140,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte por tuberías',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            140 => 
            array (
                'id' => 141,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte marítimo y de cabotaje',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            141 => 
            array (
                'id' => 142,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte fluvial',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            142 => 
            array (
                'id' => 143,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte aéreo de pasajeros',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            143 => 
            array (
                'id' => 144,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Transporte aéreo de carga',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            144 => 
            array (
                'id' => 145,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Almacenamiento y depósito',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            145 => 
            array (
                'id' => 146,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Actividades de las estaciones, vías y servicios complementarios para el transporte',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            146 => 
            array (
                'id' => 147,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Actividades postales nacionales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            147 => 
            array (
                'id' => 148,
                'categoria_actividad_economica_id' => 8,
                'nombre' => 'Actividades de mensajería',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            148 => 
            array (
                'id' => 149,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Actividades de alojamiento de estancias cortas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            149 => 
            array (
                'id' => 150,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Actividades de zonas de camping y parques para vehículos recreacionales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            150 => 
            array (
                'id' => 151,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Servicio de estancia por horas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            151 => 
            array (
                'id' => 152,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Otros tipos de alojamiento n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            152 => 
            array (
                'id' => 153,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Actividades de restaurantes, cafeterías y servicio móvil de comidas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            153 => 
            array (
                'id' => 154,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Actividades de catering para eventos y otros servicios de comidas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            154 => 
            array (
                'id' => 155,
                'categoria_actividad_economica_id' => 9,
                'nombre' => 'Expendio de bebidas alcohólicas para el consumo dentro del establecimiento',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            155 => 
            array (
                'id' => 156,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Edición de libros, publicaciones periódicas y otras actividades de edición',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            156 => 
            array (
                'id' => 157,
                'categoria_actividad_economica_id' => 10,
            'nombre' => 'Edición de programas de informática (software)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            157 => 
            array (
                'id' => 158,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de producción de películas cinematográficas, video y producción de programas, anuncios y comerciales de televisión',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            158 => 
            array (
                'id' => 159,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de grabación de sonido y edición de música',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            159 => 
            array (
                'id' => 160,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de programación y transmisión en el servicio de radiodifusión sonora',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            160 => 
            array (
                'id' => 161,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de programación y transmisión de televisión',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            161 => 
            array (
                'id' => 162,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de telecomunicaciones alámbricas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            162 => 
            array (
                'id' => 163,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de telecomunicaciones inalámbricas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            163 => 
            array (
                'id' => 164,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Actividades de telecomunicación satelital',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            164 => 
            array (
                'id' => 165,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Otras actividades de telecomunicaciones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            165 => 
            array (
                'id' => 166,
                'categoria_actividad_economica_id' => 10,
            'nombre' => 'Desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas), consultoría informática y actividades relacionadas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            166 => 
            array (
                'id' => 167,
                'categoria_actividad_economica_id' => 10,
            'nombre' => 'Procesamiento de datos, alojamiento (hosting) y actividades relacionadas; portales web',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            167 => 
            array (
                'id' => 168,
                'categoria_actividad_economica_id' => 10,
                'nombre' => 'Otras actividades de servicios de información',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            168 => 
            array (
                'id' => 169,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Intermediación monetaria',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            169 => 
            array (
                'id' => 170,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Otros tipos de intermediación monetaria',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            170 => 
            array (
                'id' => 171,
                'categoria_actividad_economica_id' => 11,
            'nombre' => 'Fideicomisos, fondos (incluye fondos de cesantías) y entidades financieras similares',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            171 => 
            array (
                'id' => 172,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Otras actividades de servicio financiero, excepto las de seguros y pensiones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            172 => 
            array (
                'id' => 173,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Seguros',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            173 => 
            array (
                'id' => 174,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Servicios de seguros sociales excepto los de pensiones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            174 => 
            array (
                'id' => 175,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Servicios de seguros sociales en pensiones, excepto los programas de seguridad social',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            175 => 
            array (
                'id' => 176,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Actividades auxiliares de las actividades de servicios financieros, excepto las de seguros y pensiones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            176 => 
            array (
                'id' => 177,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Actividades de servicios auxiliares de los servicios de seguros y pensiones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            177 => 
            array (
                'id' => 178,
                'categoria_actividad_economica_id' => 11,
                'nombre' => 'Actividades de administración de fondos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            178 => 
            array (
                'id' => 179,
                'categoria_actividad_economica_id' => 12,
                'nombre' => 'Actividades inmobiliarias realizadas con bienes propios o arrendados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            179 => 
            array (
                'id' => 180,
                'categoria_actividad_economica_id' => 12,
                'nombre' => 'Actividades inmobiliarias realizadas a cambio de una retribución o por contrata',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            180 => 
            array (
                'id' => 181,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades jurídicas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            181 => 
            array (
                'id' => 182,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades de contabilidad, teneduría de libros, auditoría financiera y asesoría tributaria',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            182 => 
            array (
                'id' => 183,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades de administración empresarial',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            183 => 
            array (
                'id' => 184,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades de consultoría de gestión',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            184 => 
            array (
                'id' => 185,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades de arquitectura e ingeniería y otras actividades conexas de consultoría técnica',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            185 => 
            array (
                'id' => 186,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Ensayos y análisis técnicos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            186 => 
            array (
                'id' => 187,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            187 => 
            array (
                'id' => 188,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            188 => 
            array (
                'id' => 189,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Publicidad',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            189 => 
            array (
                'id' => 190,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Estudios de mercado y realización de encuestas de opinión pública',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            190 => 
            array (
                'id' => 191,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades especializadas de diseño',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            191 => 
            array (
                'id' => 192,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades de fotografía',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            192 => 
            array (
                'id' => 193,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Otras actividades profesionales, científicas y técnicas n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            193 => 
            array (
                'id' => 194,
                'categoria_actividad_economica_id' => 13,
                'nombre' => 'Actividades veterinarias',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            194 => 
            array (
                'id' => 195,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Alquiler y arrendamiento de vehículos automotores',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            195 => 
            array (
                'id' => 196,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Alquiler y arrendamiento de efectos personales y enseres domésticos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            196 => 
            array (
                'id' => 197,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            197 => 
            array (
                'id' => 198,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas por derechos de autor',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            198 => 
            array (
                'id' => 199,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de agencias de gestión y colocación de empleo',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            199 => 
            array (
                'id' => 200,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de empresas de servicios temporales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            200 => 
            array (
                'id' => 201,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Otras actividades de provisión de talento humano',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            201 => 
            array (
                'id' => 202,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de las agencias de viajes y operadores turísticos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            202 => 
            array (
                'id' => 203,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Otros servicios de reserva y actividades relacionadas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            203 => 
            array (
                'id' => 204,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de seguridad privada',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            204 => 
            array (
                'id' => 205,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de servicios de sistemas de seguridad',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            205 => 
            array (
                'id' => 206,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de detectives e investigadores privados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            206 => 
            array (
                'id' => 207,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades combinadas de apoyo a instalaciones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            207 => 
            array (
                'id' => 208,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de limpieza',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            208 => 
            array (
                'id' => 209,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de paisajismo y servicios de mantenimiento conexos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            209 => 
            array (
                'id' => 210,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades administrativas y de apoyo de oficina',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            210 => 
            array (
                'id' => 211,
                'categoria_actividad_economica_id' => 14,
            'nombre' => 'Actividades de centros de llamadas (call center)',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            211 => 
            array (
                'id' => 212,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Organización de convenciones y eventos comerciales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            212 => 
            array (
                'id' => 213,
                'categoria_actividad_economica_id' => 14,
                'nombre' => 'Actividades de servicios de apoyo a las empresas n.c.p.',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            213 => 
            array (
                'id' => 214,
                'categoria_actividad_economica_id' => 15,
                'nombre' => 'Administración del Estado y aplicación de la política económica y social de la comunidad',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            214 => 
            array (
                'id' => 215,
                'categoria_actividad_economica_id' => 15,
                'nombre' => 'Prestación de servicios a la comunidad en general',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            215 => 
            array (
                'id' => 216,
                'categoria_actividad_economica_id' => 15,
                'nombre' => 'Actividades de planes de seguridad social de afiliación obligatoria',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            216 => 
            array (
                'id' => 217,
                'categoria_actividad_economica_id' => 16,
                'nombre' => 'Educación de la primera infancia, preescolar y básica primaria',
                'es_ies' => 0,
                'es_colegio' => 1,
            ),
            217 => 
            array (
                'id' => 218,
                'categoria_actividad_economica_id' => 16,
                'nombre' => 'Educación secundaria y de formación laboral',
                'es_ies' => 0,
                'es_colegio' => 1,
            ),
            218 => 
            array (
                'id' => 219,
                'categoria_actividad_economica_id' => 16,
                'nombre' => 'Establecimientos que combinan diferentes niveles de educación',
                'es_ies' => 0,
                'es_colegio' => 1,
            ),
            219 => 
            array (
                'id' => 220,
                'categoria_actividad_economica_id' => 16,
                'nombre' => 'Educación superior',
                'es_ies' => 1,
                'es_colegio' => 0,
            ),
            220 => 
            array (
                'id' => 221,
                'categoria_actividad_economica_id' => 16,
                'nombre' => 'Otros tipos de educación',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            221 => 
            array (
                'id' => 222,
                'categoria_actividad_economica_id' => 16,
                'nombre' => 'Actividades de apoyo a la educación',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            222 => 
            array (
                'id' => 223,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Actividades de hospitales y clínicas, con internación',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            223 => 
            array (
                'id' => 224,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Actividades de práctica médica y odontológica, sin internación',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            224 => 
            array (
                'id' => 225,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Otras actividades de atención relacionadas con la salud humana',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            225 => 
            array (
                'id' => 226,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Actividades de atención residencial medicalizada de tipo general',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            226 => 
            array (
                'id' => 227,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Actividades de atención residencial, para el cuidado de pacientes con retardo mental, enfermedad mental y consumo de sustancias psicoactivas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            227 => 
            array (
                'id' => 228,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            228 => 
            array (
                'id' => 229,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Otras actividades de atención en instituciones con alojamiento',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            229 => 
            array (
                'id' => 230,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Actividades de asistencia social sin alojamiento para personas mayores y discapacitadas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            230 => 
            array (
                'id' => 231,
                'categoria_actividad_economica_id' => 17,
                'nombre' => 'Otras actividades de asistencia social sin alojamiento',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            231 => 
            array (
                'id' => 232,
                'categoria_actividad_economica_id' => 18,
                'nombre' => 'Actividades creativas, artísticas y de entretenimiento',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            232 => 
            array (
                'id' => 233,
                'categoria_actividad_economica_id' => 18,
                'nombre' => 'Actividades de bibliotecas, archivos, museos y otras actividades culturales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            233 => 
            array (
                'id' => 234,
                'categoria_actividad_economica_id' => 18,
                'nombre' => 'Actividades de juegos de azar y apuestas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            234 => 
            array (
                'id' => 235,
                'categoria_actividad_economica_id' => 18,
                'nombre' => 'Actividades deportivas',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            235 => 
            array (
                'id' => 236,
                'categoria_actividad_economica_id' => 18,
                'nombre' => 'Otras actividades recreativas y de esparcimiento',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            236 => 
            array (
                'id' => 237,
                'categoria_actividad_economica_id' => 19,
                'nombre' => 'Actividades de asociaciones empresariales y de empleadores, y asociaciones profesionales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            237 => 
            array (
                'id' => 238,
                'categoria_actividad_economica_id' => 19,
                'nombre' => 'Actividades de sindicatos de empleados',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            238 => 
            array (
                'id' => 239,
                'categoria_actividad_economica_id' => 19,
                'nombre' => 'Actividades de otras asociaciones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            239 => 
            array (
                'id' => 240,
                'categoria_actividad_economica_id' => 19,
                'nombre' => 'Mantenimiento y reparación de computadores y equipo de comunicaciones',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            240 => 
            array (
                'id' => 241,
                'categoria_actividad_economica_id' => 19,
                'nombre' => 'Mantenimiento y reparación de efectos personales y enseres domésticos',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            241 => 
            array (
                'id' => 242,
                'categoria_actividad_economica_id' => 19,
                'nombre' => 'Otras actividades de servicios personales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            242 => 
            array (
                'id' => 243,
                'categoria_actividad_economica_id' => 20,
                'nombre' => 'Actividades de los hogares individuales como empleadores de personal doméstico',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            243 => 
            array (
                'id' => 244,
                'categoria_actividad_economica_id' => 20,
                'nombre' => 'Actividades no diferenciadas de los hogares individuales como productores de bienes para uso propio',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            244 => 
            array (
                'id' => 245,
                'categoria_actividad_economica_id' => 20,
                'nombre' => 'Actividades no diferenciadas de los hogares individuales como productores de servicios para uso propio',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
            245 => 
            array (
                'id' => 246,
                'categoria_actividad_economica_id' => 21,
                'nombre' => 'Actividades de organizaciones y entidades extraterritoriales',
                'es_ies' => 0,
                'es_colegio' => 0,
            ),
        ));
        
        
    }
}