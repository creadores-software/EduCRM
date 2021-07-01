<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\Contacto;
use App\Models\Contactos\Parentesco;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionFamiliarTest extends DuskTestCase
{  
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/parentescos/create?idContacto=1');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Pariente es requerido.');
            $browser->assertSee('El campo Tipo de Parentesco es requerido.');
        });
    } 

     /**
     * El contacto pariente se debe poder seleccionar de contactos 
     * previamente creados y si no existe dar la posibilidad de registrarlo.
     */
    public function testContactosNuevos()
    {
        $contacto = factory(Contacto::class)->create();
        $this->browse(function (Browser $browser) use ($contacto) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/parentescos/create?idContacto=1');
            $browser->assertSeeIn('.input-group-addon','Adicionar');
            $browser->assertValorEnSelect2('#contacto_destino',$contacto->getNombreCompleto());
            Contacto::where('id',$contacto->id)->delete();
        });
    } 

    /**
     * Solo debe existir un contacto definido como acudiente,
     * además el mismo contacto solo debe estar asociado una vez
     * en la red familiar
     */
    public function testParienteUnico()
    {
        $contacto = factory(Contacto::class)->create();
        Parentesco::create(['contacto_origen'=>1,'contacto_destino'=>$contacto->id,'tipo_parentesco_id'=>1,'acudiente'=>1]);
        $this->browse(function (Browser $browser) use ($contacto) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/parentescos/create?idContacto=1');

            $clase="App\Models\Contactos\Contacto";
            $browser->asignarValorSelect2('#contacto_destino',$clase,'getNombreCompleto()',$contacto->id);
            $browser->asignarValorSelect2('#acudiente',"value","SI",1);
            $browser->press('Guardar');         
            $browser->assertSee('El valor dado a Pariente se encuentra en otro registro. No se debe repetir.');
            $browser->assertSee('Ya existe otro pariente marcado como acudiente.');            
        });
        Parentesco::where('contacto_origen',1)->where('contacto_destino',$contacto->id)->delete();
        Parentesco::where('contacto_origen',$contacto->id)->where('contacto_destino',1)->delete();
        Contacto::where('id',$contacto->id)->delete();
    } 

     /**
      * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio

     * Al registrar un pariente se debe asociar también sobre el pariente 
     * el contacto con el tipo de parentesco contrario, de manera que ambos 
     * queden relacionados.
     */
    public function testCreacionCompletaExitosa()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/parentescos/create?idContacto=1');

            $clase="App\Models\Contactos\Contacto";
            $browser->asignarValorSelect2('#contacto_destino',$clase,'getNombreCompleto()',2);
            $clase="App\Models\Parametros\TipoParentesco";
            $browser->asignarValorSelect2('#tipo_parentesco_id',$clase,'nombre',1);
            $browser->asignarValorSelect2('#acudiente',"value","SI",1);
            $browser->press('Guardar');  

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/parentescos'); 
            $browser->assertSee('guardado(a) satisfactoriamente'); 

            //Valida que se haya asociado el parentesco contrario
            $browser->visit('/contactos/parentescos?idContacto=2');
            $browser->pause(1000);//petición ajax
            $browser->assertSee('Londoño Marin'); 
        });
        Parentesco::where('contacto_origen',2)->where('contacto_destino',1)->delete();
        Parentesco::where('contacto_origen',1)->where('contacto_destino',2)->delete();
    }
    
    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $parentesco=Parentesco::create(['contacto_origen'=>1,'contacto_destino'=>2,'tipo_parentesco_id'=>1,'acudiente'=>1]);
        $this->browse(function (Browser $browser) use ($parentesco){ 
            $browser->loginAs(User::find(1));//Superadmin
            //Revisión de vista de edición
            $browser->visit("/contactos/parentescos/{$parentesco->id}/edit?idContacto=1");                          
            $browser->waitFor('.select2'); 
            $browser->asignarValorSelect2('#acudiente',"value","NO",0); 
            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/parentescos'); 
              
            //Revisión de la vista de detalle
            $browser->visit("/contactos/parentescos/{$parentesco->id}?idContacto=1");
            $browser->assertSee('No');
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
            $browser->visit('/contactos/parentescos?idContacto=1');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Pariente'); 
            $browser->assertSee('Tipo de Parentesco');
            $browser->assertSee('Acudiente');
            $browser->assertSee('Telefono');
            $browser->assertSee('Celular');
            $browser->assertSee('Correo');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-user');
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
            $browser->visit('/contactos/parentescos?idContacto=1');
            $browser->pause(1000);//petición ajax
            $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
            
            //Se elimina familiar recién creado
            $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
            $browser->acceptDialog();            
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('eliminado(a) satisfactoriamente');

            //Valida que se haya eliminado el parentesco contrario
            $browser->visit('/contactos/parentescos?idContacto=2');
            $browser->pause(1000);//petición ajax
            $browser->assertDontSee('Londoño Marin'); 
        });   
    }
}
