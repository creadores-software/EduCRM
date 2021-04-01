<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class GeneracionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('generacion')->delete();
        
        DB::table('generacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Generación silenciosa',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Baby boomers',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Generación X',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Millennials - Generación Y',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Centennials - Generación Z',
            ),
        ));
        
        
    }
}