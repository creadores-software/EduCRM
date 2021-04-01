<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PersonalidadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('personalidad')->delete();
        
        DB::table('personalidad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Compulsiva',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Gregaria',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Autoritaria',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Ambiciosa',
            ),
        ));
        
        
    }
}