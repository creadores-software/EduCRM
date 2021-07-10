<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ActividadOcioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('actividad_ocio')->delete();
        
        DB::table('actividad_ocio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Tocar un instrumento musical',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Jugar al aire libre',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Leer libros',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Leer revistas',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Leer comics',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Navegar en internet',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Videojuegos',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Deporte o ejercicio físico',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Ver televisión',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Ver series',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Ver peliculas',
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Pintar',
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Estar con los amigos',
            ),
        ));
        
        
    }
}