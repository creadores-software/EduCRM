<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\Contacto;
use App\Models\Parametros\Origen;
use App\Models\Parametros\Prefijo;
use Exception;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionGeneralTest extends DuskTestCase
{  

    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/create');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Nombres es requerido.');
            $browser->assertSee('El campo Apellidos es requerido.');
            $browser->assertSee('El campo Celular es requerido.');
            $browser->assertSee('El campo Correo personal es requerido.');
            $browser->assertSee('El campo Origen es requerido.');
        });

    }  

    /**
     * Valida que muestre el contacto a seleccionar con la opción referido
     */
    public function testAsociarReferido()
    {
        $referido = Origen::where('nombre','Referido')->first();
        if(!empty($referido)){
            $this->browse(function (Browser $browser) use ($referido){
                $browser->loginAs(User::find(1));//Superadmin
                $browser->visit('/contactos/contactos/create');
                $browser->assertDontSee('Referido Por');
                $clase="App\Models\Parametros\Origen";
                $browser->asignarValorSelect2('#origen_id',$clase,'nombre',$referido->id);
                $browser->assertSee('Referido Por');
            });
        }
    } 
    
    /**
     * Valida que no permita crear un contacto con la misma cédula (repetido)
     */
    public function testContactoRepetido()
    {
        $contacto = factory(Contacto::class)->create();
        $this->browse(function (Browser $browser) use ($contacto){
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/create');
            $browser->type('identificacion', $contacto->identificacion); 
            $browser->press('Guardar');             
            $browser->assertSee('No se debe repetir');
        }); 
        Contacto::where('id',$contacto->id)->delete();
    } 

    /**
     * Valida que la fecha nacimiento sea seleccionable y menor a la actual
     */
    public function testFechaMenorHoy()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/create');
            $browser->assertDateTimeExistente('#fecha_nacimiento');
            $browser->asignarFecha('#fecha_nacimiento', now());
            $browser->press('Guardar');         
            $browser->assertSee('debe ser antes de hoy');
        }); 
    } 

    /**
     * Valida que el prefijo se cargue de acuerdo con el género
     */
    public function testPrefijoConGenero()
    {
        $prefijo = Prefijo::find(1);
        if(!empty($prefijo)){
            $prefijo_erroneo = Prefijo::where('genero_id','<>',$prefijo->genero_id)->first();
            $this->browse(function (Browser $browser) use ($prefijo,$prefijo_erroneo){            
                $browser->loginAs(User::find(1));//Superadmin
                $browser->visit('/contactos/contactos/create');
                $clase="App\Models\Parametros\Genero";
                $browser->asignarValorSelect2('#genero_id',$clase,'nombre',$prefijo->genero->id);
                $browser->assertValorEnSelect2('#prefijo_id',$prefijo->nombre,$prefijo_erroneo->nombre);
            }); 
        }        
    } 

    /**
     * Valida que el componente de ubicación solicite el pais y en caso 
     * de ser Colombia también debe pedir departamento y ciudad
     */
    public function testUbicacion()
    {        
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/create');
            $browser->assertValidarUbicacion('#lugar_residencia');
        });        
    } 

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    { 
        $contacto = factory(Contacto::class)->make()->toArray();
        $this->browse(function (Browser $browser) use ($contacto){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/create');
            $browser->waitFor('.select2'); 

            $browser->type('nombres',$contacto['nombres']);
            $browser->type('apellidos',$contacto['apellidos']);
            $browser->type('correo_personal',$contacto['correo_personal']);
            $browser->type('celular',$contacto['celular']);
            
            $clase="App\Models\Parametros\Origen";
            $browser->asignarValorSelect2('#origen_id',$clase,'nombre',$contacto['origen_id']);
            
            $clase="App\Models\Parametros\TipoDocumento";
            $browser->asignarValorSelect2('#tipo_documento_id',$clase,'nombre',$contacto['tipo_documento_id']);
            
            $browser->type('identificacion',$contacto['identificacion']);
            $browser->type('telefono',$contacto['telefono']);
            $browser->type('correo_institucional',$contacto['correo_institucional']);
            
            $clase="App\Models\Parametros\Genero";
            $browser->asignarValorSelect2('#genero_id',$clase,'nombre',$contacto['genero_id']);
            
            $clase="App\Models\Parametros\Prefijo";
            $browser->asignarValorSelect2('#prefijo_id',$clase,'nombre',$contacto['prefijo_id']);
            
            $browser->asignarFecha('#fecha_nacimiento',Carbon::parse($contacto['fecha_nacimiento']));
            
            $clase="App\Models\Parametros\EstadoCivil";
            $browser->asignarValorSelect2('#estado_civil_id',$clase,'nombre',$contacto['estado_civil_id']);
            
            $browser->scrollIntoView('#direccion_residencia');

            $browser->type('direccion_residencia',$contacto['direccion_residencia']);
            $browser->type('barrio',$contacto['barrio']);
            
            $browser->asignarValorSelect2('#estrato',"value",$contacto['estrato'],$contacto['estrato']);
            
            $clase="App\Models\Parametros\Sisben";
            $browser->asignarValorSelect2('#sisben_id',$clase,'nombre',$contacto['sisben_id']);
            
            $browser->asignarUbicacion('#lugar_residencia');

            $clase="App\Models\Parametros\TipoContacto";            
            //Se asignan los primeros dos tipos de contacto
            $browser->asignarValorMultipleSelect2('#tiposContacto',$clase,'nombre',[1,2]);
            
            $browser->asignarValorSelect2('#activo',"value","SI",1);
            $browser->type('observacion',$contacto['observacion']);
            
            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/contactos'); 
            $browser->assertSee('guardado(a) satisfactoriamente'); 
            Contacto::where('identificacion',$contacto['identificacion'])->delete();             
        });   
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/1/edit');

            $browser->waitFor('.select2'); 
            $browser->type('nombres','Nuevo nombre');   

            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/contactos/1'); 
            $browser->assertSee('Nuevo nombre');   
            $browser->assertSee('actualizado(a) satisfactoriamente');   
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
            $browser->visit('/contactos/contactos/');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Identificación'); 
            $browser->assertSee('Nombres');
            $browser->assertSee('Apellidos');
            $browser->assertSee('Celular');
            $browser->assertSee('Correo Personal');
            $browser->assertSee('Origen');
            $browser->assertSee('Activo');
            $browser->assertSee('ID');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-eye-open');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-pencil');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-trash');
            //Buscadores inferiores
            $browser->assertPresent('#dataTableBuilder tfoot tr th input');
            //Botón superior
            $browser->assertPresent('#dataTableBuilder_wrapper .dt-buttons .buttons-export');
            $browser->assertSee('Búsqueda avanzada');
        });   
    }

    /**
     * Valida la opción de eliminar
     */
    public function testEliminar()
    { 
        $this->browse(function (Browser $browser){ 
            $contacto = factory(Contacto::class)->make()->toArray();
            $contacto['nombres']='Alejandra'; // Para que aparezca de primera
            Contacto::create($contacto);

            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/');
            $browser->pause(1000);//petición ajax
            $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
            
            //Opción de eliminar contacto nuevo -> satisfactorio
            $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
            $browser->acceptDialog();            
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('eliminado(a) satisfactoriamente');

             //Opción de eliminar contacto antiguo con relaciones -> con error
             $browser->pause(1000);//petición ajax
             $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
             $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
             $browser->acceptDialog();       
             $browser->waitFor('.alert-danger'); 
             $browser->assertSee('No se puede eliminar el registro');
        });   
    }

    /**
     * Valida la opción importar
     */
    public function testImportar()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/subirImportacion');
            $browser->assertSeeLink('Descargar plantilla');
        });   
    }
}
