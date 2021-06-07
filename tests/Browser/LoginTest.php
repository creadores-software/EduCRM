<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    use DatabaseTransactions;

    /**
     * Valida que no permita ingresa hasta el home con autenticación incorrecta
     */
    public function testAutenticacionInvalida()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'superadmin@crm.com');
            $browser->type('password', 'contraseñaerrada');
            $browser->press('Iniciar sesión');
            $browser->assertPathIs('/login');
        });

    }

    /**
     * Valida que permita ingresa hasta el home con autenticación válida
     */
    public function testAutenticacionValida()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'superadmin@crm.com');
            $browser->type('password', 'superadmin');
            $browser->press('Iniciar sesión');
            $browser->assertPathIs('/home');
            $browser->assertSee('Super Administrador');
        });
    }
}
