<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Campanias\Campania;
use App\Models\Formaciones\Formacion;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Campania_CampaniaTest extends DuskTestCase
{ 
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/campanias/create');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Tipo de Campaña es requerido.');
            $browser->assertSee('El campo Nombre es requerido.');
            $browser->assertSee('El campo Periodo Académico es requerido.');
            $browser->assertSee('El campo Equipo de Mercadeo es requerido.');
        });

    }     

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    { 
        $campania = factory(Campania::class)->make()->toArray();
        $this->browse(function (Browser $browser) use ($campania){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/campanias/create');
            $browser->waitFor('.select2'); 

            $browser->type('nombre',$campania['nombre']);

            $clase="App\Models\Campanias\TipoCampania";
            $browser->asignarValorSelect2('#tipo_campania_id',$clase,'nombre',$campania['tipo_campania_id']);
            
            $clase="App\Models\Formaciones\PeriodoAcademico";
            $browser->asignarValorSelect2('#periodo_academico_id',$clase,'nombre',$campania['periodo_academico_id']);

            $clase="App\Models\Admin\EquipoMercadeo";
            $browser->asignarValorSelect2('#equipo_mercadeo_id',$clase,'nombre',$campania['equipo_mercadeo_id']);
            
            $browser->asignarFecha('#fecha_inicio',Carbon::parse($campania['fecha_inicio']));
            $browser->asignarFecha('#fecha_final',Carbon::parse($campania['fecha_final']));

            $browser->asignarValorSelect2('#activa',"value","SI",1);

            $clase="App\Models\Contactos\Segmento";
            $browser->asignarValorSelect2('#segmento_id',$clase,'nombre',$campania['segmento_id']);

            $browser->type('inversion_formato',$campania['inversion']);

            $clase="App\Models\Formaciones\Facultad";
            $browser->asignarValorSelect2('#facultad_id',$clase,'nombre',$campania['facultad_id']);

            $clase="App\Models\Formaciones\NivelAcademico";
            $browser->asignarValorSelect2('#nivel_academico_id',$clase,'nombre',$campania['nivel_academico_id']);

            $clase="App\Models\Formaciones\NivelFormacion";
            $browser->asignarValorSelect2('#nivel_formacion_id',$clase,'nombre',$campania['nivel_formacion_id']);

            $formacion1 = Formacion::
                where('facultad_id',$campania['facultad_id'])
                ->where('nivel_formacion_id',$campania['nivel_formacion_id'])
                ->where('activo',1)->where('entidad_id',106)
                ->inRandomOrder()
                ->first();
            $formacion2 = Formacion::
                where('facultad_id',$campania['facultad_id'])
                ->where('nivel_formacion_id',$campania['nivel_formacion_id'])
                ->where('activo',1)->where('entidad_id',106)
                ->where('id','<>',$formacion1->id)
                ->inRandomOrder()
                ->first();

            $clase="App\Models\Formaciones\Formacion";     
            $browser->asignarValorMultipleSelect2('#campaniaFormacionesAsociadas',$clase,'nombre',[$formacion1->id,$formacion2->id]);
            
            $browser->assertPresent('#cke_descripcion');

            $browser->escribirCKEditor('#cke_descripcion iframe',$campania['descripcion']);
                        
            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/campanias'); 
            $browser->assertSee('guardado(a) satisfactoriamente'); 
            Campania::where('nombre',$campania['nombre'])->delete();             
        });   
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/campanias/1/edit');

            $browser->waitFor('.select2'); 
            $browser->type('nombre','Nuevo nombre');   

            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/campanias');              
            $browser->assertSee('actualizado(a) satisfactoriamente');  
            
            $browser->visit('/campanias/campanias/1');
            $browser->assertSee('Nuevo nombre');  
            $browser->assertSee('Log de auditoria');
            //Se deja nuevamente igual
            $campania = Campania::where('id',1)->first();
            $campania->nombre='Estudiantes antiguos 2021-03'; 
            $campania->save();
        });   
    }

    /**
     * Valida la vista de administración
     */
    public function testAdminCompleto()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/campanias/');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Tipo de Campaña'); 
            $browser->assertSee('Nombre');
            $browser->assertSee('Periodo Académico');
            $browser->assertSee('Equipo de Mercadeo');
            $browser->assertSee('Activa');
            $browser->assertSee('ID');
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
            $campania = factory(Campania::class)->make()->toArray();
            $campania['nombre']='AACAmpania'; // Para que aparezca de primera
            Campania::create($campania);

            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/campanias/');
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
