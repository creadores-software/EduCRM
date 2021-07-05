<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Campanias\Oportunidad;
use App\Models\Formaciones\Formacion;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Campania_OportunidadTest extends DuskTestCase
{ 
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades/create?idCampania=1');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Contacto es requerido.');
            $browser->assertSee('El campo Estado es requerido.');
            $browser->assertSee('El campo Razón de Estado es requerido.');
        });

    }     

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    { 
        $oportunidad = factory(Oportunidad::class)->make()->toArray();
        $this->browse(function (Browser $browser) use ($oportunidad){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades/create?idCampania=1');
            $browser->waitFor('.select2'); 

            $clase="App\Models\Contactos\Contacto";
            $browser->asignarValorSelect2('#contacto_id',$clase,'getNombreCompleto()',$oportunidad['contacto_id']);

            $clase="App\Models\Formaciones\Formacion";
            $browser->asignarValorSelect2('#formacion_id',$clase,'nombre',$oportunidad['formacion_id']);

            $clase="App\Models\Campanias\EstadoCampania";
            $browser->asignarValorSelect2('#estado_campania_id',$clase,'nombre',$oportunidad['estado_campania_id']);

            $clase="App\Models\Campanias\JustificacionEstadoCampania";
            $browser->asignarValorSelect2('#justificacion_estado_campania_id',$clase,'nombre',$oportunidad['justificacion_estado_campania_id']);

            $browser->type('ingreso_recibido_formato',$oportunidad['ingreso_recibido']);
            $browser->type('ingreso_proyectado_formato',$oportunidad['ingreso_proyectado']);

            $browser->asignarValorSelect2('#capacidad',"value",$oportunidad['capacidad'],$oportunidad['capacidad']);
            $browser->asignarValorSelect2('#interes',"value",$oportunidad['interes'],$oportunidad['interes']);

            $clase="App\Models\Admin\User";
            $browser->asignarValorSelect2('#responsable_id',$clase,'name',$oportunidad['responsable_id']);
                        
            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/oportunidades'); 
            $browser->assertSee('guardado(a) satisfactoriamente');
            $ultimaOportunidad=Oportunidad::orderBy('id','desc')->first();
            Oportunidad::where('id',$ultimaOportunidad->id)->delete();             
        });   
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades/1/edit?idCampania=1');

            $browser->waitFor('.select2'); 
            $clase="App\Models\Admin\User";
            $browser->asignarValorSelect2('#responsable_id',$clase,'name',3);  

            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/oportunidades');              
            $browser->assertSee('actualizado(a) satisfactoriamente');  
            
            $browser->visit('/campanias/oportunidades/1');
            $browser->assertSee('Coordinador');  
            $browser->assertSee('Log de auditoria');
            //Se deja nuevamente igual
            $oportunidad = Oportunidad::where('id',1)->first();
            $oportunidad->responsable_id=4;
            $oportunidad->save();
        });   
    }

    /**
     * Valida la vista de administración
     */
    public function testAdminCompleto()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades?idCampania=1');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Contacto'); 
            $browser->assertSee('Categoría');
            $browser->assertSee('Formación');
            $browser->assertSee('Responsable');
            $browser->assertSee('Estado');
            $browser->assertSee('Última Actualización');
            $browser->assertSee('Dias');
            $browser->assertSee('Última Interacción');
            $browser->assertSee('ID');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-comment');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-eye-open');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-pencil');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-trash');
            //Buscadores inferiores
            $browser->assertPresent('#dataTableBuilder tfoot tr th input');
        });   
    }

    /**
     * Valida la opción de eliminar
     */
    public function testEliminar()
    { 
        $this->browse(function (Browser $browser){ 
            $oportunidad = factory(Oportunidad::class)->make()->toArray();
            $oportunidad['ultima_actualizacion']=Carbon::today()->subYears(2); // Para que aparezca de primera
            $oportunidad['campania_id']=1;
            Oportunidad::create($oportunidad);

            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades?idCampania=1');
            $browser->pause(1000);//petición ajax
            $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
            
            //Opción de eliminar campania nueva -> satisfactorio
            $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
            $browser->acceptDialog();            
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('eliminado(a) satisfactoriamente');

             //Opción de eliminar campania antigua con oportunidades -> con error
             $browser->pause(1000);//petición ajax
             $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
             $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
             $browser->acceptDialog();       
             $browser->waitFor('.alert-danger'); 
             $browser->assertSee('No se puede eliminar el registro');
        });   
    }
}
