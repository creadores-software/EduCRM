<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RazaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('raza')->delete();
        
        DB::table('raza')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Blanco',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Afrocolombiano',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Raizal',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Palanquero',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Otra comunidad negra',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Asiático',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Hispano',
            ),
        ));
        
        
    }
}