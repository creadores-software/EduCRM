<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class FrecuenciaUsoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('frecuencia_uso')->delete();
        
        DB::table('frecuencia_uso')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Estudiante 1 formación',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Estudiante 2 formación',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Estudiante 3 formaciones o más',
            ),
        ));
        
        
    }
}