<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CampaniaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('campania')->delete();
        
        DB::table('campania')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipo_campania_id' => 1,
                'nombre' => 'Estudiantes antiguos 2021-03',
                'periodo_academico_id' => 6,
                'equipo_mercadeo_id' => 1,
                'fecha_inicio' => '2021-05-01',
                'fecha_final' => '2021-12-31',
                'descripcion' => NULL,
                'inversion' => 10000000.0,
                'nivel_formacion_id' => 3,
                'nivel_academico_id' => 1,
                'facultad_id' => NULL,
                'segmento_id' => 1,
                'activa' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'tipo_campania_id' => 2,
                'nombre' => 'Estudiantes nuevos 2021-01',
                'periodo_academico_id' => 6,
                'equipo_mercadeo_id' => 1,
                'fecha_inicio' => '2021-05-01',
                'fecha_final' => '2021-12-31',
                'descripcion' => NULL,
                'inversion' => 20000000.0,
                'nivel_formacion_id' => NULL,
                'nivel_academico_id' => NULL,
                'facultad_id' => NULL,
                'segmento_id' => 1,
                'activa' => 1,
            ),
        ));
        
        
    }
}