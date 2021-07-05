<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Campanias\Interaccion;
use App\Models\Formaciones\Formacion;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Campania_InteraccionTest extends DuskTestCase
{ 
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/interacciones/create?idOportunidad=1');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Fecha fin es requerido.');
            $browser->assertSee('El campo Tipo de Interacción es requerido.');
            $browser->assertSee('El campo Estado de Interacción es requerido.');
            $browser->assertSee('El campo Observación debe ser un texto.');
        });

    }     

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    { 
        $interaccion = factory(Interaccion::class)->make()->toArray();
        $this->browse(function (Browser $browser) use ($interaccion){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/interacciones/create?idOportunidad=1');
            $browser->waitFor('.select2'); 

            $clase="App\Models\Campanias\TipoInteraccion";
            $browser->asignarValorSelect2('#tipo_interaccion_id',$clase,'nombre',$interaccion['tipo_interaccion_id']);

            $clase="App\Models\Campanias\EstadoInteraccion";
            $browser->asignarValorSelect2('#estado_interaccion_id',$clase,'nombre',$interaccion['estado_interaccion_id']);

            $browser->asignarFecha('#fecha_inicio',Carbon::parse($interaccion['fecha_inicio']));
            $browser->asignarFecha('#fecha_fin',Carbon::parse($interaccion['fecha_fin']));

            $browser->type('#observacion',$interaccion['observacion']);
                        
            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/interacciones'); 
            $browser->assertSee('guardado(a) satisfactoriamente');
            $ultimaInteraccion=Interaccion::orderBy('id','desc')->first();
            Interaccion::where('id',$ultimaInteraccion->id)->delete();             
        });   
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/interacciones/3/edit');

            $browser->waitFor('.select2'); 
            $browser->type('observacion','Cambio de observacion');

            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/interacciones');              
            $browser->assertSee('actualizado(a) satisfactoriamente');  
            
            $browser->visit('/campanias/interacciones/3');
            $browser->assertSee('Cambio de observacion');  
            $browser->assertSee('Log de auditoria');
            //Se deja nuevamente igual
            $interaccion = Interaccion::where('id',3)->first();
            $interaccion->observacion='Prueba de interacción planeada para hoy de admin';
            $interaccion->save();
        });   
    }

    /**
     * Valida la vista de administración
     */
    public function testAdminCompleto()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/interacciones?idOportunidad=1');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Campaña'); 
            $browser->assertSee('Tipo de Interacción');
            $browser->assertSee('Estado');
            $browser->assertSee('Fecha Inicio');
            $browser->assertSee('Fecha Fin');
            $browser->assertSee('Observación');
            $browser->assertSee('Usuario');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-eye-open');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-pencil');
            //Buscadores inferiores
            $browser->assertPresent('#dataTableBuilder tfoot tr th input');
        });   
    }

    /**
     * Valida la opción importar
     */
    public function testImportar()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/interacciones/subirImportacion');
            $browser->assertSeeLink('Descargar plantilla');
            $browser->attach('archivo', 'tests/Browser/Files/plantilla_interacciones.xlsx');
            $browser->press('Cargar importación'); 
            /** 
             * Teniendo en cuenta los datos ingresados en el archivo de prueba, 
             * deben cargar solo dos registros y salir los siguientes errores
             */
            $browser->waitFor('.alert-danger'); 
            $browser->assertSee('Error en la linea 3: No existe oportunidad con este id');
            $browser->assertSee('Error en la linea 3: No existe usuario con este id');
            $browser->assertSee('Error en la linea 3: No existe tipo de interacción con este id');
            $browser->assertSee('Error en la linea 3: No existe estado de interacción con este id');
            $browser->assertSee('Error en la linea 3: El estado de interacción no corresponde al tipo de interacción');
            $browser->assertSee('Error en la linea 4: El campo fecha_inicio es requerido');
            $browser->assertSee('Error en la linea 4: El campo fecha_fin es requerido');
            $browser->assertSee('Error en la linea 4: El campo tipo_interaccion_id es requerido');
            $browser->assertSee('Error en la linea 4: El campo estado_interaccion_id es requerido');
            $browser->assertSee('Error en la linea 4: El campo users_id es requerido');
            $browser->assertSee('Error en la linea 5: Ya existe una interaccion con esta oportunidad para el mismo usuario y fecha');
            $browser->assertSee('Se importaron sin error 1 registro(s)');
            //Se eliminan datos de prueba cargados
            Interaccion::where('id','>',5)->delete();

        });   
    }
}
