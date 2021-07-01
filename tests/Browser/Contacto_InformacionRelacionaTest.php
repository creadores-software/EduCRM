<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionRelacional;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionRelacionalTest extends DuskTestCase
{  
    /**
     * Valida que cuando se crea el contacto crea la información relacional 
     * con autorización de comunicación
     */
    public function testCreaciónVistaExitosa()
    { 
        $contacto = factory(Contacto::class)->create();
        $this->browse(function (Browser $browser) use ($contacto){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit("contactos/informacionesRelacionales/{$contacto->informacionRelacional->id}?idContacto={$contacto->id}");
            $browser->waitFor('.form-group'); 
            $browser->assertSourceHas('<p>Si</p>');
            $browser->assertSee('Log de auditoria');
            Contacto::where('identificacion',$contacto->id)->delete();             
        });   
    }

    /**
     * Valida que todos los campos sean opcionales (exceptuando autoriza comunicación)
     */
    public function testEdicionCamposOpcionales()
    { 
        $contacto = factory(Contacto::class)->create();
        $this->browse(function (Browser $browser) use ($contacto){ 
            $browser->loginAs(User::find(1));//Superadmin
            
            //Validación con campos opcionales
            $browser->visit("contactos/informacionesRelacionales/{$contacto->informacionRelacional->id}/edit?idContacto={$contacto->id}");
            $browser->waitFor('.select2'); 
            $browser->limpiarTodosSelect2(); 
            $browser->asignarValorSelect2('#autoriza_comunicacion',"value","SI",1);
            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs("/contactos/informacionesRelacionales/{$contacto->informacionRelacional->id}"); 
            $browser->assertSee('actualizado(a) satisfactoriamente'); 
            Contacto::where('identificacion',$contacto->id)->delete();            
        });   
    }

    /**
     * Valida que que liste solo las formaciones activas de la Universidad elegida 
     * Y solo niveles relacionadas con IES
     */
    public function testNivelesFormacionesCorrectas()
    { 
        $contacto = factory(Contacto::class)->create();
        $this->browse(function (Browser $browser) use ($contacto){ 
            $browser->loginAs(User::find(1));//Superadmin            
            $browser->visit("contactos/informacionesRelacionales/{$contacto->informacionRelacional->id}/edit?idContacto={$contacto->id}");
            $browser->waitFor('.select2'); 
            $browser->limpiarTodosSelect2(); 
            $browser->assertValorEnSelect2('#maximo_nivel_formacion_id','Nivel','Curso');
            $browser->assertValorEnSelect2('#preferenciasFormaciones','ADMINISTRACIÓN DE EMPRESAS / Presencia','COMUNICACIÓN SOCIAL - PERIODISMO / Presencial');
            Contacto::where('identificacion',$contacto->id)->delete();            
        });   
    }

    /**
     * Valida que todos los campos sean opcionales (exceptuando autoriza comunicación)
     */
    public function testEdicionCompleta()
    { 
        $contacto = factory(Contacto::class)->create();
        $infoRelacional = factory(InformacionRelacional::class)->make()->toArray();
        $this->browse(function (Browser $browser) use ($contacto,$infoRelacional){ 
            $browser->loginAs(User::find(1));//Superadmin
            
            $browser->visit("contactos/informacionesRelacionales/{$contacto->informacionRelacional->id}/edit?idContacto={$contacto->id}");
            $browser->waitFor('.select2'); 
            $browser->limpiarTodosSelect2(); 

            $clase="App\Models\Formaciones\NivelFormacion";
            $browser->asignarValorSelect2('#maximo_nivel_formacion_id',$clase,'nombre',$infoRelacional['maximo_nivel_formacion_id']);
            
            $clase="App\Models\Entidades\Ocupacion";
            $browser->asignarValorSelect2('#ocupacion_actual_id',$clase,'nombre',$infoRelacional['ocupacion_actual_id']);
            
            $clase="App\Models\Parametros\EstiloVida";
            $browser->asignarValorSelect2('#estilo_vida_id',$clase,'nombre',$infoRelacional['estilo_vida_id']);
            
            $clase="App\Models\Parametros\Religion";
            $browser->asignarValorSelect2('#religion_id',$clase,'nombre',$infoRelacional['religion_id']);
            
            $clase="App\Models\Parametros\Raza";
            $browser->asignarValorSelect2('#raza_id',$clase,'nombre',$infoRelacional['raza_id']);
            
            $clase="App\Models\Parametros\Generacion";
            $browser->asignarValorSelect2('#generacion_id',$clase,'nombre',$infoRelacional['generacion_id']);
            
            $clase="App\Models\Parametros\Personalidad";
            $browser->asignarValorSelect2('#personalidad_id',$clase,'nombre',$infoRelacional['personalidad_id']);
            
            $clase="App\Models\Parametros\Beneficio";
            $browser->asignarValorSelect2('#beneficio_id',$clase,'nombre',$infoRelacional['beneficio_id']);
            
            $clase="App\Models\Parametros\FrecuenciaUso";
            $browser->asignarValorSelect2('#frecuencia_uso_id',$clase,'nombre',$infoRelacional['frecuencia_uso_id']);
            
            $clase="App\Models\Parametros\EstatusUsuario";
            $browser->asignarValorSelect2('#estatus_usuario_id',$clase,'nombre',$infoRelacional['estatus_usuario_id']);
            
            $clase="App\Models\Parametros\EstatusLealtad";
            $browser->asignarValorSelect2('#estatus_lealtad_id',$clase,'nombre',$infoRelacional['estatus_lealtad_id']);
            
            $clase="App\Models\Parametros\EstadoDisposicion";
            $browser->asignarValorSelect2('#estado_disposicion_id',$clase,'nombre',$infoRelacional['estado_disposicion_id']);
            
            $clase="App\Models\Parametros\ActitudServicio";
            $browser->asignarValorSelect2('#actitud_servicio_id',$clase,'nombre',$infoRelacional['actitud_servicio_id']);
           
            $browser->asignarValorSelect2('#autoriza_comunicacion',"value","SI",1);

            $clase="App\Models\Parametros\MedioComunicacion";
            $browser->asignarValorMultipleSelect2('#preferenciasMediosComunicacion',$clase,'nombre',[1,2]);

            $clase="App\Models\Formaciones\Formacion";
            $browser->asignarValorMultipleSelect2('#preferenciasFormaciones',$clase,'nombre',[13410,13409]);

            $clase="App\Models\Formaciones\CampoEducacion";
            $browser->asignarValorMultipleSelect2('#preferenciasCamposEducacion',$clase,'nombre',[1,2]);

            $clase="App\Models\Parametros\ActividadOcio";
            $browser->asignarValorMultipleSelect2('#preferenciasActividadesOcio',$clase,'nombre',[1,2]);

            $clase="App\Models\Parametros\BuyerPersona";
            $browser->asignarValorMultipleSelect2('#preferenciasBuyersPersona',$clase,'nombre',[1]);

            $browser->press('Guardar');   

            $browser->waitFor('.alert-success'); 
            $browser->assertSee('actualizado(a) satisfactoriamente'); 

            Contacto::where('identificacion',$contacto->id)->delete();            
        });   
    }
}
