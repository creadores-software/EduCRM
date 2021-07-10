<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstadoInteraccionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estado_interaccion')->delete();
        
        DB::table('estado_interaccion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Realizada',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Planeada',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'No contesta',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Número errado',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Correo rebota',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Correo de voz',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Cancelada',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'No asistió',
                'descripcion' => NULL,
                'tipo_estado_color_id' => 3,
            ),
        ));
        
        
    }
}