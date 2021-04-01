<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoAccesoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_acceso')->delete();
        
        DB::table('tipo_acceso')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Tradicional',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Reingreso',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'ICBF',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Ser Pilo Paga 2',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Ser Pilo Paga 3',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Ser Pilo Paga 1',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Ser Pilo Paga 4',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Generación E',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'UTC',
            ),
        ));
        
        
    }
}