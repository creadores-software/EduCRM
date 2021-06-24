<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{

    //Para cerrar sesión después de cada método
    protected function tearDown(): void
    {
        session()->flush();
        parent::tearDown();
    }

    
    /**
     * Valida que no permita ingresar con autenticación incorrecta
     */
    public function testAutenticacionInvalida()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'superadmin@crm.com');
            $browser->type('password', 'contraseñaerrada');
            $browser->press('Iniciar sesión');            
            $browser->assertSee('Usuario y/o contraseña incorrectos');
        });

    }

    /**
     * Valida que no permita ingresar con un usuario suspendido
     */
    public function testUsuarioSuspendido()
    {    
        $usuario = User::where('email','auxiliar@crm.com')->first();
        $usuario->active=0;
        $usuario->save();    

        $this->browse(function (Browser $browser) use ($usuario) {
            $browser->visit('/login');
            $browser->type('email', 'auxiliar@crm.com');
            $browser->type('password', 'auxiliar');
            $browser->press('Iniciar sesión');         
            $browser->assertSee('Tu cuenta no está activa');

            $usuario->active=1;
            $usuario->save();
        });

    }

    /**
     * Valida que permita ingresar hasta el home con autenticación válida
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
