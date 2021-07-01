<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\InformacionLaboral;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionLaboralTest extends DuskTestCase
{  
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesLaborales/create?idContacto=1');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Entidad es requerido.');
            $browser->assertSee('El campo Ocupación es requerido.');
            $browser->assertSee('El campo Fecha inicio es requerido.');
        });
    } 

    /**
     * Valida el comportamiento esperado de las fechas
     */
    public function testFechas()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesLaborales/create?idContacto=1');
            $browser->asignarValorSelect2('#vinculado_actualmente',"value","NO",0);
            $browser->assertDateTimeExistente('#fecha_inicio');
            $browser->assertDateTimeExistente('#fecha_fin');
            $browser->asignarFecha('#fecha_inicio', Carbon::tomorrow());
            $browser->press('Guardar'); 
            $browser->assertSee('Fecha inicio debe ser igual o anterior a hoy');
            $browser->asignarFecha('#fecha_inicio', Carbon::today());
            $browser->asignarFecha('#fecha_fin', Carbon::yesterday());
            $browser->press('Guardar');              
            $browser->assertSee('Fecha fin debe ser posterior a fecha inicio');
        }); 
    }

    /**
     * Valida la visibilidad dependiente de la fecha fin y 
     * el campo "vinculado actualmente"
     */
    public function testVisibilidadDependiente()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesLaborales/create?idContacto=1');
            $browser->assertDontSee('Fecha Fin');  
            $browser->asignarValorSelect2('#vinculado_actualmente',"value","NO",0);  
            $browser->assertSee('Fecha Fin');          
        }); 
    }

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    {
        $infoLabor = factory(InformacionLaboral::class)->make()->toArray();
        $this->browse(function (Browser $browser) use($infoLabor){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesLaborales/create?idContacto=1');                          
            $browser->waitFor('.select2');             
            
            $clase="App\Models\Entidades\Entidad";
            $browser->asignarValorSelect2('#entidad_id',$clase,'nombre',$infoLabor['entidad_id']);

            $clase="App\Models\Entidades\Ocupacion";
            $browser->asignarValorSelect2('#ocupacion_id',$clase,'nombre',$infoLabor['ocupacion_id']);

            $browser->asignarValorSelect2('#vinculado_actualmente',"value","NO",0);

            $browser->asignarFecha('#fecha_inicio',Carbon::parse($infoLabor['fecha_inicio']));
            $browser->asignarFecha('#fecha_fin',Carbon::parse($infoLabor['fecha_fin']));

            $browser->type('area',$infoLabor['area']);
            $browser->type('telefono',$infoLabor['telefono']);
            $browser->type('funciones',$infoLabor['funciones']);

            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/informacionesLaborales'); 
            $browser->assertSee('guardado(a) satisfactoriamente'); 
        }); 
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            //Revisión de vista de edición
            $browser->visit('/contactos/informacionesLaborales/1/edit?idContacto=1');                          
            $browser->waitFor('.select2'); 
            $browser->type('area','Mi Área');   
            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/informacionesLaborales'); 
              
            //Revisión de la vista de detalle
            $browser->visit('/contactos/informacionesLaborales/1?idContacto=1');
            $browser->assertSee('Mi Área');
            $browser->assertSee('Log de auditoria');                          
        });   
    }

     /**
     * Valida la vista de administración
     */
    public function testAdminCompleto()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesLaborales?idContacto=1');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Entidad'); 
            $browser->assertSee('Ocupación');
            $browser->assertSee('Fecha Inicio');
            $browser->assertSee('Fecha Fin');
            $browser->assertSee('Vinculado Actualmente');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
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
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesLaborales?idContacto=1');
            $browser->pause(1000);//petición ajax
            $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
            
            //Se elimina historial recién creado
            $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
            $browser->acceptDialog();            
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('eliminado(a) satisfactoriamente');
        });   
    }
}
