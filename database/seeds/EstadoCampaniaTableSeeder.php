<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstadoCampaniaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estado_campania')->delete();
        
        DB::table('estado_campania')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'En proceso',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Graduado',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Matriculado',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Retiro',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Aplazamiento',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Interesado',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Preinscrito',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Inscrito',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Admitido',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'En espera',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
        ));
        
        
    }
}