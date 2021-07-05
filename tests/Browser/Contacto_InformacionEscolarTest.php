<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\InformacionEscolar;
use App\Models\Entidades\Entidad;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionEscolarTest extends DuskTestCase
{  
    /**
     * Valida que muestre error con los campos requeridos cuando no se ingresa ninguno.
     */
    public function testCamposRequeridos()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesEscolares/create?idContacto=1');
            $browser->press('Guardar');         
            $browser->assertSee('El campo Entidad es requerido.');
            $browser->assertSee('El campo Nivel de Formación es requerido.');
        });
    } 

    /**
     * Valida el comportamiento esperado de las fechas
     */
    public function testFechas()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesEscolares/create?idContacto=1');
            $browser->assertDateTimeExistente('#fecha_inicio');
            $browser->assertDateTimeExistente('#fecha_grado');
            $browser->assertDateTimeExistente('#fecha_icfes');
            $browser->asignarFecha('#fecha_inicio', Carbon::tomorrow());
            $browser->press('Guardar'); 
            $browser->assertSee('Fecha inicio debe ser igual o anterior a hoy');
            $browser->asignarFecha('#fecha_inicio', Carbon::today());
            $browser->asignarFecha('#fecha_grado', Carbon::yesterday());
            $browser->asignarFecha('#fecha_icfes', Carbon::yesterday());
            $browser->press('Guardar');              
            $browser->assertSee('Fecha grado debe ser posterior a fecha inicio');
            $browser->assertSee('Fecha icfes debe ser posterior a fecha inicio');
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
            $browser->visit('/contactos/informacionesEscolares/create?idContacto=1');                          
            $browser->assertSee('Fecha Grado');
            $browser->asignarValorSelect2('#finalizado',"value","NO",0);
            $browser->assertDontSee('Fecha Grado');
        }); 
    }

    /**
     * Valida que solo se muestras niveles y entidades escolares
     */
    public function testEntidadesNivelesEscolares()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesEscolares/create?idContacto=1');                          
            $browser->waitFor('.select2'); 
            $entidadColegio = Entidad::create(['nombre'=>'AAAAAColegio','lugar_id'=>1,'actividad_economica_id'=>219]);
            $entidadUniversidad = Entidad::create(['nombre'=>'AAAAAUniversidad','lugar_id'=>1,'actividad_economica_id'=>220]);
            $browser->assertValorEnSelect2('#entidad_id',$entidadColegio->nombre,$entidadUniversidad->nombre);
            $browser->assertValorEnSelect2('#nivel_formacion_id','Basica primaria','Doctorado');
            Entidad::where('id',$entidadColegio->id)->delete();
            Entidad::where('id',$entidadUniversidad->id)->delete();
        }); 
    }

    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testCreacionCompletaExitosa()
    {
        $infoEscolar = factory(InformacionEscolar::class)->make()->toArray();
        $this->browse(function (Browser $browser) use($infoEscolar){            
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/informacionesEscolares/create?idContacto=1');                          
            $browser->waitFor('.select2');             
            
            $clase="App\Models\Entidades\Entidad";
            $browser->asignarValorSelect2('#entidad_id',$clase,'nombre',$infoEscolar['entidad_id']);

            $clase="App\Models\Formaciones\NivelFormacion";
            $browser->asignarValorSelect2('#nivel_formacion_id',$clase,'nombre',$infoEscolar['nivel_formacion_id']);

            $browser->asignarFecha('#fecha_inicio',Carbon::parse($infoEscolar['fecha_inicio']));
            $browser->asignarFecha('#fecha_grado',Carbon::parse($infoEscolar['fecha_grado']));
            $browser->asignarFecha('#fecha_icfes',Carbon::parse($infoEscolar['fecha_icfes']));

            $browser->type('grado',$infoEscolar['grado']);
            $browser->type('puntaje_icfes',$infoEscolar['puntaje_icfes']);

            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/informacionesEscolares'); 
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
            $browser->visit('/contactos/informacionesEscolares/1/edit?idContacto=1');                          
            $browser->waitFor('.select2'); 
            $browser->type('grado',11);   
            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/informacionesEscolares'); 
              
            //Revisión de la vista de detalle
            $browser->visit('/contactos/informacionesEscolares/1?idContacto=1');
            $browser->assertSee(11);
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
            $browser->visit('/contactos/informacionesEscolares?idContacto=1');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Entidad'); 
            $browser->assertSee('Nivel de Formación');
            $browser->assertSee('Fecha Inicio');
            $browser->assertSee('Finalizado');
            $browser->assertSee('Grado Escolar');
            $browser->assertSee('Puntaje Icfes');
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
            $browser->visit('/contactos/informacionesEscolares?idContacto=1');
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
