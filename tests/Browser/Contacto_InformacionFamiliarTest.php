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
}
