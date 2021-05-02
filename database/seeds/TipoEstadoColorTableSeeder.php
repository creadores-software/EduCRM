<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoEstadoColorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_estado_color')->delete();
        
        DB::table('tipo_estado_color')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Positivo',
                'color_hexadecimal' => '#AE7',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Neutro',
                'color_hexadecimal' => '#EE7',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Negativo',
                'color_hexadecimal' => '#FAA',
            ),
        ));
        
        
    }
}