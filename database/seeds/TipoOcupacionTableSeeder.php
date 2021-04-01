<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoOcupacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_ocupacion')->delete();
        
        DB::table('tipo_ocupacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Ocupaciones de dirección y gerencia',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Finanzas y administración',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Ciencias naturales, aplicadas y relacionadas',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Salud',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Ciencias sociales, educación, servicios gubernamentales y religión',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Arte, cultura, esparcimiento y deportes',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Ventas y servicios',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Explotación primaria y extractiva',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Operación de equipos, del transporte y oficios',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Procesamiento, fabricación y ensamble',
            ),
        ));
        
        
    }
}