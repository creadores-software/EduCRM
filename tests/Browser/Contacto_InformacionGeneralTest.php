<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\Contacto;
use App\Models\Parametros\Origen;
use App\Models\Parametros\Prefijo;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use function Symfony\Component\String\b;

class Contacto_InformacionGeneralTest extends DuskTestCase
{  
    use WithoutMiddleware;

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
                $browser->asignarValorSelect2('#origen_id','Referido',$referido->id);
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
        $contacto->delete();
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
                $browser->asignarValorSelect2('#genero_id',$prefijo->genero->nombre,$prefijo->genero->id);
                $browser->assertValorEnSelect2('#prefijo_id',$prefijo->nombre,$prefijo_erroneo->nombre);
            }); 
        }        
    } 
}
