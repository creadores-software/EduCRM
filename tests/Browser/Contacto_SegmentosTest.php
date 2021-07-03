<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\Segmento;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_SegmentosTest extends DuskTestCase
{  
     /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/create');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Nombre es requerido.');
            $browser->assertSee('El campo Descripción es requerido.');
        });
    } 
    
     /**
     * Valida que en Información General se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadFiltroGeneral()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-user');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Nombres');
            $browser->assertSee('Apellidos');
            $browser->assertSee('Correo Personal');
            $browser->assertSee('Celular');
            $browser->assertSee('Origen');
            $browser->assertSee('Identificación');
            $browser->assertSee('Referido Por');
            $browser->assertSee('Otro origen');
            $browser->assertSee('Tipo de Documento');
            $browser->assertSee('Teléfono');
            $browser->assertSee('Correo Institucional');
            $browser->assertSee('Género');
            $browser->assertSee('Prefijo');
            $browser->assertSee('Estado Civil');
            $browser->assertSee('Fecha de Nacimiento');
            $browser->assertSee('Cumpleaños');
            $browser->assertSee('Edad');
            $browser->assertSee('Dirección de Residencia');
            $browser->assertSee('Barrio');
            $browser->assertSee('Estrato');
            $browser->assertSee('Sisben');
            $browser->assertSee('Ubicación de Residencia');
            $browser->assertSee('Tipo de Contacto');
            $browser->assertSee('Observación');
            $browser->assertSee('Activo');
        });
    } 

    /**
     * Valida que en Información Relacional se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadFiltroRelacional()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-heart');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Máximo Nivel de Formación');
            $browser->assertSee('Ocupación Actual');
            $browser->assertSee('Estilo de Vida');
            $browser->assertSee('Religión');
            $browser->assertSee('Raza');
            $browser->assertSee('Generación');
            $browser->assertSee('Personalidad');
            $browser->assertSee('Beneficio');
            $browser->assertSee('Frecuencia de Uso');
            $browser->assertSee('Estatus de Usuario');
            $browser->assertSee('Estatus de Lealtad');
            $browser->assertSee('Estado de Disposición');
            $browser->assertSee('Actitud ante el Servicio');
            $browser->assertSee('Autoriza Comunicación');
            $browser->assertSee('Preferencias Medios de Comunicación');
            $browser->assertSee('Preferencias Formaciones');
            $browser->assertSee('Preferencias Campos de Educación');
            $browser->assertSee('Preferencias Actividades de Ocio');
            $browser->assertSee('Perfiles Buyer Persona');
        });
    } 

    /**
     * Valida que en Información Universitaria se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadFiltroUniversitario()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-graduation-cap');         
            $browser->pause(500);//petición ajax   
            $browser->clickLink('Historial Universitario');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Entidad');
            $browser->assertSee('Ubicación de Entidad');
            $browser->assertSee('Formación');
            $browser->assertSee('Categoría Campo de Educación');
            $browser->assertSee('Campo de Educación');
            $browser->assertSee('Tipo de Acceso');
            $browser->assertSee('Promedio');
            $browser->assertSee('Periodo Alcanzado');
            $browser->assertSee('Fecha de Inicio');
            $browser->assertSee('Fecha de Grado');
            $browser->assertSee('Periodo Académico Inicial');
            $browser->assertSee('Periodo Académico Final');
            $browser->assertSee('Finalizado');
        });
    } 

    /**
     * Valida que en Información Escolar se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadFiltroEscolar()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-graduation-cap');    
            $browser->pause(500);//petición ajax        
            $browser->clickLink('Historial Escolar');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Entidad');
            $browser->assertSee('Ubicación de Entidad');
            $browser->assertSee('Nivel de Formación');
            $browser->assertSee('Grado Escolar');
            $browser->assertSee('Fecha de Inicio');
            $browser->assertSee('Fecha de Grado');
            $browser->assertSee('Fecha Icfes');
            $browser->assertSee('Puntaje Icfes');
            $browser->assertSee('Finalizado');
        });
    } 

     /**
     * Valida que en Información Laboral se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadFiltroLaboral()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-briefcase');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Entidad');
            $browser->assertSee('Ubicación de Entidad');
            $browser->assertSee('Categoría Actividad Económica');
            $browser->assertSee('Actividad Económica');
            $browser->assertSee('Categoría Ocupación');
            $browser->assertSee('Ocupación');
            $browser->assertSee('Área');
            $browser->assertSee('Teléfono');
            $browser->assertSee('Funciones');
            $browser->assertSee('Fecha de Inicio');
            $browser->assertSee('Fecha de Fin');
            $browser->assertSee('Vinculado Actualmente');
        });
    } 

     /**
     * Valida que en Información Familiar se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadFiltroFamiliar()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-users');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Rol familiar');
            $browser->assertSee('Acudiente');
            $browser->assertSee('Cantidad hijos');
            $browser->assertSee('Edad hijos');
        });
    }

    /**
     * Valida que en Información de Campañas se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadCampania()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-filter');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Tipo de Campaña');
            $browser->assertSee('Campaña');
            $browser->assertSee('Estado');
            $browser->assertSee('Razon de Estado');
            $browser->assertSee('Categoría Oportunidad');
            $browser->assertSee('Campaña activa');
        });
    }

     /**
     * Valida que en Información de Interacciones se encuentren disponibles
     * los campos que se filtrarán
     */
    public function testVisibilidadInteraccion()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit('/contactos/segmentos/create');
            $browser->click('.fa-comment');
            $browser->pause(500);//petición ajax
            $browser->assertSee('Tipo de Interacción');
            $browser->assertSee('Estado de Interacción');
            $browser->assertSee('Fecha de Inicio');
            $browser->assertSee('Fecha de Fin');
        });
    }

     /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/create');
            $browser->waitFor('.select2'); 

            $browser->type('nombre','AALondoño Marin');
            $browser->type('descripcion','Segmento para probar creación exitosa');
            $browser->asignarValorSelect2('#global',"value","SI",1);
            
            $browser->type('apellidos','Londoño Marin');
            $clase="App\Models\Parametros\Origen";            
            //Se asignan los primeros dos tipos de género
            $browser->asignarValorMultipleSelect2('#generos',$clase,'nombre',[1,2]);
            
            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/segmentos'); 
            $browser->assertSee('guardado(a) satisfactoriamente');            
        });   
    }

    /**
     * Valida que funcione correctamente la vista previa
     */
    public function testVistasPrevia()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/create');            
            $browser->type('apellidos','Londoño Marin');
            $browser->press('Vista Previa');
            $window = collect($browser->driver->getWindowHandles())->last();
            $browser->driver->switchTo()->window($window);
            $browser->pause(500);//petición ajax
            $browser->assertSee('Londoño Marin'); 
            $browser->assertDontSee('Marin Arias');            
        });   

        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/create');
            $browser->waitFor('.select2');
            $browser->type('apellidos','Marin Arias');
            $browser->press('Vista Previa');
            $window = collect($browser->driver->getWindowHandles())->last();
            $browser->driver->switchTo()->window($window);
            $browser->pause(500);//petición ajax
            $browser->assertSee('Marin Arias');   
            $browser->assertDontSee('Londoño Marin');          
        }); 
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            //Revisión de vista de edición
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/2/edit');
            $browser->waitFor('.select2');             
            $browser->type('apellidos','Marin Arias');
            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/segmentos'); 
            
            //Revisión de la vista de detalle
            $browser->visit('/contactos/segmentos/2');
            $browser->assertSee('Marin Arias'); 
            $browser->assertSee('Log de auditoria'); 
            Segmento::where('nombre','AALondoño Marin')->delete();  
        });   
    }

    /**
     * Valida la vista de administración
     */
    public function testAdminCompleto()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/');
            $browser->pause(500);//petición ajax
            //Columnas en Datatable 
            $browser->assertSee('Nombre');
            $browser->assertSee('Descripción');
            $browser->assertSee('Visibilidad Pública');
            $browser->assertSee('Usuario');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-duplicate');
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
            $segmento = factory(Segmento::class)->make()->toArray();
            $segmento['nombre']='AAASegmento'; // Para que aparezca de primera
            Segmento::create($segmento);

            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/segmentos/');
            $browser->pause(500);//petición ajax
            $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
            
            //Opción de eliminar contacto nuevo -> satisfactorio
            $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
            $browser->acceptDialog();            
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('eliminado(a) satisfactoriamente');

             //Opción de eliminar contacto antiguo con relaciones -> con error
             $browser->pause(500);//petición ajax
             $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
             $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
             $browser->acceptDialog();       
             $browser->waitFor('.alert-danger'); 
             $browser->assertSee('No se puede eliminar el registro');
        });   
    }
}
