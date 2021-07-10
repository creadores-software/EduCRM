<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoContactoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_contacto')->delete();
        
        DB::table('tipo_contacto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Estudiante',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Proveedor',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Docente',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Administrativo',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Empresa',
            ),
        ));
        
        
    }
}