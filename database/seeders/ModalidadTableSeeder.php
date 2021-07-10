<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ModalidadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('modalidad')->delete();
        
        DB::table('modalidad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Presencial',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Virtual',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Distancia',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Extendida',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Polimodal',
            ),
        ));
        
        
    }
}