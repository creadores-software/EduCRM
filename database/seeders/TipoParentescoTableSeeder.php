<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoParentescoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_parentesco')->delete();
        
        DB::table('tipo_parentesco')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Padre/Madre',
                'tipo_contrario_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
            'nombre' => 'Hijo(a)',
                'tipo_contrario_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
            'nombre' => 'Tio(a)',
                'tipo_contrario_id' => 4,
            ),
            3 => 
            array (
                'id' => 4,
            'nombre' => 'Sobrino(a)',
                'tipo_contrario_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
            'nombre' => 'Abuelo(a)',
                'tipo_contrario_id' => 6,
            ),
            5 => 
            array (
                'id' => 6,
            'nombre' => 'Nieto(a)',
                'tipo_contrario_id' => 5,
            ),
            6 => 
            array (
                'id' => 7,
            'nombre' => 'Primo(a)',
                'tipo_contrario_id' => 7,
            ),
            7 => 
            array (
                'id' => 8,
            'nombre' => 'Esposo(a)',
                'tipo_contrario_id' => 8,
            ),
            8 => 
            array (
                'id' => 9,
            'nombre' => 'Hermano(a)',
                'tipo_contrario_id' => 9,
            ),
            9 => 
            array (
                'id' => 10,
            'nombre' => 'Cuñado(a)',
                'tipo_contrario_id' => 10,
            ),
            10 => 
            array (
                'id' => 11,
            'nombre' => 'Suegro(a)',
                'tipo_contrario_id' => 12,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Yerno/Nuera',
                'tipo_contrario_id' => 11,
            ),
        ));
        
        
    }
}