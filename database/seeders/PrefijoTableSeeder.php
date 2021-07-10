<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PrefijoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('prefijo')->delete();
        
        DB::table('prefijo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'genero_id' => 1,
                'nombre' => 'Don',
            ),
            1 => 
            array (
                'id' => 2,
                'genero_id' => 2,
                'nombre' => 'Doña',
            ),
            2 => 
            array (
                'id' => 3,
                'genero_id' => 1,
                'nombre' => 'Señor',
            ),
            3 => 
            array (
                'id' => 4,
                'genero_id' => 2,
                'nombre' => 'Señora',
            ),
            4 => 
            array (
                'id' => 5,
                'genero_id' => 2,
                'nombre' => 'Señorita',
            ),
            5 => 
            array (
                'id' => 6,
                'genero_id' => 1,
                'nombre' => 'Doctor',
            ),
            6 => 
            array (
                'id' => 7,
                'genero_id' => 1,
                'nombre' => 'Licenciado',
            ),
            7 => 
            array (
                'id' => 8,
                'genero_id' => 1,
                'nombre' => 'Ingeniero',
            ),
            8 => 
            array (
                'id' => 9,
                'genero_id' => 2,
                'nombre' => 'Doctora',
            ),
            9 => 
            array (
                'id' => 10,
                'genero_id' => 2,
                'nombre' => 'Licenciada',
            ),
            10 => 
            array (
                'id' => 11,
                'genero_id' => 2,
                'nombre' => 'Ingeniera',
            ),
        ));
        
        
    }
}