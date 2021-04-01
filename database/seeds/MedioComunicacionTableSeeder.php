<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class MedioComunicacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('medio_comunicacion')->delete();
        
        DB::table('medio_comunicacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Correo electrónico',
                'es_red_social' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Teléfono fijo',
                'es_red_social' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Celular',
                'es_red_social' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Whatsapp',
                'es_red_social' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Facebook',
                'es_red_social' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Instagram',
                'es_red_social' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Linkedin',
                'es_red_social' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Twitter',
                'es_red_social' => 1,
            ),
        ));
        
        
    }
}