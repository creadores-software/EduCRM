<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ContactoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('contacto')->delete();
        
        DB::table('contacto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipo_documento_id' => NULL,
                'identificacion' => '1053815524',
                'prefijo_id' => NULL,
                'nombres' => 'Valentina',
                'apellidos' => 'Londoño Marin',
                'fecha_nacimiento' => NULL,
                'genero_id' => NULL,
                'estado_civil_id' => NULL,
                'celular' => '3122790874',
                'telefono' => NULL,
                'correo_personal' => 'valoma.vld@gmail.com',
                'correo_institucional' => NULL,
                'lugar_residencia' => NULL,
                'direccion_residencia' => NULL,
                'barrio' => NULL,
                'estrato' => NULL,
                'sisben_id' => NULL,
                'observacion' => NULL,
                'referido_por' => NULL,
                'origen_id' => 1,
                'otro_origen' => NULL,
                'activo' => 1,
                'informacion_relacional_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'tipo_documento_id' => NULL,
                'identificacion' => '30284667',
                'prefijo_id' => NULL,
                'nombres' => 'Miriam',
                'apellidos' => 'Marin Arias',
                'fecha_nacimiento' => NULL,
                'genero_id' => NULL,
                'estado_civil_id' => NULL,
                'celular' => '3122790874',
                'telefono' => NULL,
                'correo_personal' => 'accesoriosmiriammarin@gmai.com',
                'correo_institucional' => NULL,
                'lugar_residencia' => NULL,
                'direccion_residencia' => NULL,
                'barrio' => NULL,
                'estrato' => NULL,
                'sisben_id' => NULL,
                'observacion' => NULL,
                'referido_por' => 1,
                'origen_id' => 7,
                'otro_origen' => NULL,
                'activo' => 1,
                'informacion_relacional_id' => 2,
            ),
        ));
        
        
    }
}