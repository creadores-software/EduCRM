<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\InformacionUniversitaria;
use App\Models\Entidades\Entidad;
use App\Models\Formaciones\Formacion;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionUniversitariaTest extends DuskTestCase
{  
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesUniversitarias/create?idContacto=1');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Entidad es requerido.');
            $browser->assertSee('El campo Formación es requerido.');
        });
    } 

    /**
     * Valida el comportamiento esperado de las fechas
     */
    public function testFechas()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesUniversitarias/create?idContacto=1');
            $browser->assertDateTimeExistente('#fecha_inicio');
            $browser->assertDateTimeExistente('#fecha_grado');
            $browser->asignarFecha('#fecha_inicio', Carbon::tomorrow());
            $browser->press('Guardar'); 
            $browser->assertSee('Fecha inicio debe ser igual o anterior a hoy');
            $browser->asignarFecha('#fecha_inicio', Carbon::today());
            $browser->asignarFecha('#fecha_grado', Carbon::yesterday());
            $browser->press('Guardar');              
            $browser->assertSee('Fecha grado debe ser posterior a fecha inicio');
        }); 
    }

    /**
     * Valida la visibilidad dependiente de la fecha de grado
     * y el estado finalizado
     */
    public function testVisibilidadDependiente()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesUniversitarias/create?idContacto=1');                          
            $browser->assertSee('Fecha Grado');
            $browser->assertSee('Periodo Académico Final');
            $browser->asignarValorSelect2('#finalizado',"value","NO",0);
            $browser->assertDontSee('Fecha Grado');
            $browser->assertDontSee('Periodo Académico Final');
        }); 
    }

    /**
     * Valida que solo se muestre entidades IES con sus respectivas formaciones
     */
    public function testEntidadesFormaciones()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesUniversitarias/create?idContacto=1');                          
            $browser->waitFor('.select2'); 
            
            $entidadColegio = Entidad::create(['nombre'=>'AAAAAColegio','lugar_id'=>1,'actividad_economica_id'=>219]);
            $entidadUniversidad = Entidad::create(['nombre'=>'AAAAAUniversidad','lugar_id'=>1,'actividad_economica_id'=>220]);
            
            $formacionSi = Formacion::create(['nombre'=>'AAAAAFormacionSi','entidad_id'=>$entidadUniversidad->id,'nivel_formacion_id'=>8]);
            $formacionNo = Formacion::create(['nombre'=>'AAAAAFormacionNo','entidad_id'=>1,'nivel_formacion_id'=>8]);
            
            $browser->assertValorEnSelect2('#entidad_id',$entidadUniversidad->nombre,$entidadColegio->nombre);
            $browser->assertValorEnSelect2('#formacion_id',$formacionSi->nombre,$formacionNo->nombre);

            Formacion::where('id',$formacionSi->id)->delete();
            Formacion::where('id',$formacionNo->id)->delete();
            
            Entidad::where('id',$entidadColegio->id)->delete();
            Entidad::where('id',$entidadUniversidad->id)->delete();
        }); 
    }

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    {
        $infoUniver = factory(InformacionUniversitaria::class)->make()->toArray();
        $this->browse(function (Browser $browser) use($infoUniver){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesUniversitarias/create?idContacto=1');                          
            $browser->waitFor('.select2');             
            
            $clase="App\Models\Entidades\Entidad";
            $browser->asignarValorSelect2('#entidad_id',$clase,'nombre',$infoUniver['entidad_id']);

            $clase="App\Models\Formaciones\Formacion";
            $browser->asignarValorSelect2('#formacion_id',$clase,'nombre',$infoUniver['formacion_id']);

            $clase="App\Models\Formaciones\TipoAcceso";
            $browser->asignarValorSelect2('#tipo_acceso_id',$clase,'nombre',$infoUniver['tipo_acceso_id']);

            $clase="App\Models\Formaciones\PeriodoAcademico";
            $browser->asignarValorSelect2('#periodo_academico_inicial',$clase,'nombre',$infoUniver['periodo_academico_inicial']);
            $browser->asignarValorSelect2('#periodo_academico_final',$clase,'nombre',$infoUniver['periodo_academico_final']);

            $browser->asignarFecha('#fecha_inicio',Carbon::parse($infoUniver['fecha_inicio']));
            $browser->asignarFecha('#fecha_grado',Carbon::parse($infoUniver['fecha_grado']));

            $browser->type('promedio',$infoUniver['promedio']);
            $browser->type('periodo_alcanzado',$infoUniver['periodo_alcanzado']);

            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/informacionesUniversitarias'); 
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
            $browser->visit('/contactos/informacionesUniversitarias/1/edit?idContacto=1');                          
            $browser->waitFor('.select2'); 
            $browser->type('periodo_alcanzado',12);   
            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/informacionesUniversitarias'); 
              
            //Revisión de la vista de detalle
            $browser->visit('/contactos/informacionesUniversitarias/1?idContacto=1');
            $browser->assertSee(12);
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
            $browser->visit('/contactos/informacionesUniversitarias?idContacto=1');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Entidad'); 
            $browser->assertSee('Formación');
            $browser->assertSee('Finalizado');
            $browser->assertSee('Promedio');
            $browser->assertSee('Periodo Alcanzado');
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
            $browser->visit('/contactos/informacionesUniversitarias?idContacto=1');
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
