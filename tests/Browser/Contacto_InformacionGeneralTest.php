<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Parametros\Origen;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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
                $browser->script('jQuery("#origen_id").append($("<option selected=\'selected\'></option>").val('.$referido->id.').text("Referido")).trigger("change");');
                $browser->assertSee('Referido Por');
            });
        }
    }  
}
