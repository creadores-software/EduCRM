<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ConceptoPagoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('concepto_pago')->delete();
        
        DB::table('concepto_pago')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Matricula',
                'valor' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Crédito Adicional',
                'valor' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Inscripción',
                'valor' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Certificado',
                'valor' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Derechos de grado',
                'valor' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Carnet',
                'valor' => NULL,
            ),
        ));
        
        
    }
}