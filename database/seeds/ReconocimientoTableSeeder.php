<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ReconocimientoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('reconocimiento')->delete();
        
        DB::table('reconocimiento')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Acreditación de alta calidad',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Acreditación previa',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Registro calificado',
            ),
        ));
        
        
    }
}