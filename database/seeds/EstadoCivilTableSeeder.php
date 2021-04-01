<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstadoCivilTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estado_civil')->delete();
        
        DB::table('estado_civil')->insert(array (
            0 => 
            array (
                'id' => 1,
            'nombre' => 'Soltero(a)',
            ),
            1 => 
            array (
                'id' => 2,
            'nombre' => 'Casado(a)',
            ),
            2 => 
            array (
                'id' => 3,
            'nombre' => 'Divorciado(a)',
            ),
            3 => 
            array (
                'id' => 4,
            'nombre' => 'Viudo(a)',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Unión libre',
            ),
            5 => 
            array (
                'id' => 6,
            'nombre' => 'Religioso(a)',
            ),
            6 => 
            array (
                'id' => 7,
            'nombre' => 'Separado(a)',
            ),
        ));
        
        
    }
}