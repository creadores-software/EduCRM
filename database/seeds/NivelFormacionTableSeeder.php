<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class NivelFormacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('nivel_formacion')->delete();
        
        DB::table('nivel_formacion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Técnica profesional',
                'nivel_academico_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Tecnológica',
                'nivel_academico_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Universitaria',
                'nivel_academico_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Especialización universitaria',
                'nivel_academico_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Especialización médico quirúrgica',
                'nivel_academico_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Especialización técnico profesional',
                'nivel_academico_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Especialización tecnológica',
                'nivel_academico_id' => 2,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Maestría',
                'nivel_academico_id' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Doctorado',
                'nivel_academico_id' => 2,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Diplomado idiomas',
                'nivel_academico_id' => 3,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Diplomado educación continuada',
                'nivel_academico_id' => 3,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Congreso',
                'nivel_academico_id' => 3,
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Curso corto',
                'nivel_academico_id' => 3,
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Basica primaria',
                'nivel_academico_id' => 4,
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'Basica secundaria',
                'nivel_academico_id' => 4,
            ),
            15 => 
            array (
                'id' => 16,
                'nombre' => 'Educación media',
                'nivel_academico_id' => 4,
            ),
            16 => 
            array (
                'id' => 17,
                'nombre' => 'Educación primera infancia',
                'nivel_academico_id' => 4,
            ),
        ));
        
        
    }
}