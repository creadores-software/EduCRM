<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoriaCampoEducacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('categoria_campo_educacion')->delete();
        
        DB::table('categoria_campo_educacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Programas y certificaciones genéricos',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Educación',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Artes y humanidades',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Ciencias sociales, periodismo e información',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Administración de empresas y derecho',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Ciencias naturales, matemáticas y estadística',
            ),
            6 => 
            array (
                'id' => 7,
            'nombre' => 'Tecnologías de la información y la comunicación (TIC)',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Ingeniería, industria y construcción',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Agropecuario, silvicultura, pesca y veterinaria',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Salud y bienestar',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Servicios',
            ),
        ));
        
        
    }
}