<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ParentescoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('parentesco')->delete();
        
        DB::table('parentesco')->insert(array (
            0 => 
            array (
                'id' => 1,
                'contacto_origen' => 1,
                'contacto_destino' => 2,
                'acudiente' => 1,
                'tipo_parentesco_id' => 1
            ),
            1 => 
            array (
                'id' => 2,
                'contacto_origen' => 2,
                'contacto_destino' => 1,
                'acudiente' => 0,
                'tipo_parentesco_id' => 2
            ),
        ));
        
        
    }
}