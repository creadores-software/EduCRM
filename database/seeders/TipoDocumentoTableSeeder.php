<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_documento')->delete();
        
        DB::table('tipo_documento')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Cédula de ciudadanía',
                'abreviacion' => 'CC',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Documento de Identidad Extranjera',
                'abreviacion' => 'DE',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Cédula de Extranjería',
                'abreviacion' => 'CE',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Tarjeta de Identidad',
                'abreviacion' => 'TI',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Pasaporte',
                'abreviacion' => 'PS',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Certificado cabildo',
                'abreviacion' => 'CA',
            ),
        ));
        
        
    }
}