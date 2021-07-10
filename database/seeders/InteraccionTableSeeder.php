<?php

use Carbon\Carbon;
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class InteraccionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('interaccion')->delete();
        
        DB::table('interaccion')->insert(array (
            0 => //Interacción atrasada de auxiliar
            array (
                'id' => 1,
                'fecha_inicio'=>Carbon::yesterday(),
                'fecha_fin'=>Carbon::yesterday(),
                'tipo_interaccion_id'=>1, //Correo
                'estado_interaccion_id'=>2, //Planeada
                'observacion'=>'Prueba de interacción planeada atrasada de auxiliar',
                'oportunidad_id'=>1,
                'users_id'=>4,
                'contacto_id'=>NULL,
            ),
            1 => //Interacción atrasada de Admin
            array (
                'id' => 2,
                'fecha_inicio'=>Carbon::yesterday(),
                'fecha_fin'=>Carbon::yesterday(),
                'tipo_interaccion_id'=>2, //Llamada
                'estado_interaccion_id'=>2, //Planeada
                'observacion'=>'Prueba de interacción planeada atrasada de admin',
                'oportunidad_id'=>2,
                'users_id'=>1,
                'contacto_id'=>NULL,
            ),
            2 => //Interacción hoy pendiente de Admin
            array (
                'id' => 3,
                'fecha_inicio'=>Carbon::today()->setTime(23,58),
                'fecha_fin'=> Carbon::today()->setTime(23,59),
                'tipo_interaccion_id'=>3, //Reunión
                'estado_interaccion_id'=>2, //Planeada
                'observacion'=>'Prueba de interacción planeada para hoy de admin',
                'oportunidad_id'=>3,
                'users_id'=>1,
                'contacto_id'=>NULL,
            ),
            3 => //Interacción hoy realizada de Admin
            array (
                'id' => 4,
                'fecha_inicio'=>Carbon::today()->setTime(0,0),
                'fecha_fin'=> Carbon::today()->setTime(0,5),
                'tipo_interaccion_id'=>1, //Llamada
                'estado_interaccion_id'=>1, //Realizada
                'observacion'=>'Prueba de interacción realizada hoy por auxiliar',
                'oportunidad_id'=>3,
                'users_id'=>4,
                'contacto_id'=>NULL,
            ),
            4 => //Interacción hoy realizada de Auxiliar
            array (
                'id' => 5,
                'fecha_inicio'=>Carbon::today()->setTime(0,0),
                'fecha_fin'=> Carbon::today()->setTime(0,5),
                'tipo_interaccion_id'=>1, //Llamada
                'estado_interaccion_id'=>1, //Realizada
                'observacion'=>'Prueba de interacción realizada hoy por admin',
                'oportunidad_id'=>3,
                'users_id'=>1,
                'contacto_id'=>NULL,
            ),
        ));    
    }
}