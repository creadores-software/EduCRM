<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class SegmentoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('segmento')->delete();
        
        DB::table('segmento')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Madres',
                'descripcion' => 'Madres',
                'filtros' => '[{"campo":"parentescoTipos","valor":"1=Padre\\/Madre,"}]',
                'global' => 0,
                'usuario_id' => 1,
            ),
        ));
        
        
    }
}