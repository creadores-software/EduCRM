<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RangoIngresosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('rango_ingresos')->delete();
        
        DB::table('rango_ingresos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Menos de un SMLV',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Entre 1 y 1,5 SMLV ',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Entre 1,5 y 2 SMLV',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Entre 2 y 2,5 SMLV',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Entre 2,5 y 3 SMLV',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Entre 3 y 3,5 SMLV',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Entre 3,5 y 4 SMLV',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Entre 4 y 4,5 SMLV',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Entre 4,5 y 5 SMLV',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Entre 5 y 5,5 SMLV',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Entre 5,5 y 6 SMLV',
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Mas de 6 SMLV',
            ),
        ));
        
        
    }
}