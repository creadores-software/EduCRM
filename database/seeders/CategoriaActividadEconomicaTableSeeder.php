<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoriaActividadEconomicaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('categoria_actividad_economica')->delete();
        
        DB::table('categoria_actividad_economica')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Agricultura, ganadería, caza, silvicultura y pesca',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Explotación de minas y canteras',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Industrias manufactureras',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Suministro de electricidad, gas, vapor y aire acondicionado',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Distribución de agua; evacuación y tratamiento de aguas residuales, gestión de desechos y actividades de saneamiento ambiental',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Construcción',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Comercio al por mayor y al por menor; reparación de vehículos automotores y motocicletas',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Transporte y almacenamiento',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Alojamiento y servicios de comida',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Información y comunicaciones',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Actividades financieras y de seguros',
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Actividades inmobiliarias',
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Actividades profesionales, científicas y técnicas',
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Actividades de servicios administrativos y de apoyo',
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'Administración pública y defensa; planes de seguridad social de afiliación obligatoria',
            ),
            15 => 
            array (
                'id' => 16,
                'nombre' => 'Educación',
            ),
            16 => 
            array (
                'id' => 17,
                'nombre' => 'Actividades de atención de la salud humana y de asistencia social',
            ),
            17 => 
            array (
                'id' => 18,
                'nombre' => 'Actividades artísticas, de entretenimiento y recreación',
            ),
            18 => 
            array (
                'id' => 19,
                'nombre' => 'Otras actividades de servicios',
            ),
            19 => 
            array (
                'id' => 20,
                'nombre' => 'Actividades de hogares en calidad de empleadores; actividades no diferenciadas de hogares como productores de bienes y servicios para uso propio',
            ),
            20 => 
            array (
                'id' => 21,
                'nombre' => 'Actividades de organizaciones y entidades extraterritoriales',
            ),
        ));
        
        
    }
}