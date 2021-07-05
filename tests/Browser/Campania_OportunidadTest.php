<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Campanias\Campania;
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
     * Las formaciones se deben cargar de acuerdo con 
     * los parametros dados en la creación de la campaña.
     * 
     * Los estados se deben de cargar según el tipo de campaña y 
     * las razones se deben visualizar según el estado seleccionado
     * 
     * Los responsables se listarán de acuerdo con el equipo de mercadeo 
     * asignado a la campaña.
     */
    public function testParametrosDependientes()
    {
        $this->browse(function (Browser $browser){            
            $browser->loginAs(User::find(1));//Superadmin
            //Estudiantes antiguos
            $browser->visit('/campanias/oportunidades/create?idCampania=1');
            $browser->waitFor('.select2');
            //Solo pregrados
            $clase="App\Models\Formaciones\Formacion";
            $browser->assertValorEnSelect2('#formacion_id','ADMINISTRACIÓN DE EMPRESAS / Presencial','DOCTORADO EN CIENCIAS COGNITIVAS / Presencial');
            //Estado según tipo de campaña
            $clase="App\Models\Campanias\EstadoCampania";
            $browser->assertValorEnSelect2('#estado_campania_id','Aplazamiento','Preinscrito');
            $browser->asignarValorSelect2('#estado_campania_id',$clase,'nombre',5);//Aplazamiento
            //Razón según estado
            $clase="App\Models\Campanias\JustificacionEstadoCampania";
            $browser->assertValorEnSelect2('#justificacion_estado_campania_id','Motivos económicos','Paga de contado');
            //Responsables según equipo
            $clase="App\Models\Admin\User";
            $browser->assertValorEnSelect2('#responsable_id','Coordinador CRM','Admin CRM');           
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
        $oportunidad = factory(Oportunidad::class)->create();
        $this->browse(function (Browser $browser) use ($oportunidad){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit("/campanias/oportunidades/{$oportunidad->id}/edit?idCampania={$oportunidad->campania_id}");

            $browser->waitFor('.select2'); 
            $clase="App\Models\Admin\User";
            $browser->asignarValorSelect2('#responsable_id',$clase,'name',3);  

            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/campanias/oportunidades');              
            $browser->assertSee('actualizado(a) satisfactoriamente');  
            
            $browser->visit("/campanias/oportunidades/{$oportunidad->id}");
            $browser->assertSee('Coordinador');  
            $browser->assertSee('Log de auditoria');
        });   
        Oportunidad::where('id',$oportunidad->id)->delete();
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

    /**
     * Valida la opción importar
     */
    public function testImportar()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades/subirImportacion');
            $browser->assertSeeLink('Descargar plantilla');
            $browser->attach('archivo', 'tests/Browser/Files/plantilla_oportunidades.xlsx');
            $browser->press('Cargar importación'); 
            /** 
             * Teniendo en cuenta los datos ingresados en el archivo de prueba, 
             * deben cargar solo dos registros y salir los siguientes errores
             */
            $browser->waitFor('.alert-danger'); 
            $browser->assertSee('Error en la linea 3: El campo campania_id es requerido');
            $browser->assertSee('Error en la linea 3: El campo contacto_id es requerido');
            $browser->assertSee('Error en la linea 3: El campo estado_campania_id es requerido');
            $browser->assertSee('Error en la linea 3: El campo justificacion_estado_campania_id es requerido');
            $browser->assertSee('Error en la linea 4: El campo interes no debe ser mayor que 5');
            $browser->assertSee('Error en la linea 4: El campo capacidad no debe ser mayor que 5');
            $browser->assertSee('Error en la linea 4: El campo ingreso_recibido debe ser un número');
            $browser->assertSee('Error en la linea 4: El campo ingreso_proyectado debe ser un número');
            $browser->assertSee('Se importaron sin error 1 registro(s)');
            //Se eliminan datos de prueba cargados
            Oportunidad::where('id','>',5)->delete();

        });   
    }

     /**
     * Valida la opción sincronizar
     */
    public function testSincronizar()
    { 
        $campania = factory(Campania::class)->make()->toArray();
        $campania['segmento_id']=1; // Madres
        $campania=Campania::create($campania);
        $this->browse(function (Browser $browser) use ($campania){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/campanias/oportunidades?idCampania='.$campania->id);
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertDontSee('Miriam Marin Arias'); 
            //Opción de sincronizar
            $browser->click('.fa-filter');
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('Se han sincronizado 1 contacto(s). Debe asignar un responsable y contactar para completar la información');
            $browser->assertSee('Miriam Marin Arias');            
        });   
        Oportunidad::where('campania_id',$campania->id)->delete();
        Campania::where('id',$campania->id)->delete();
    }
}
