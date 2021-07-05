<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Para los test de reportes, se cuenta con la siguiente información:
 * 
 * OPORTUNIDADES
 * 1. Oportunidad roja de auxiliar (4) - Camp1 / Con2
 * 2. Oportunidad amarilla de Superadmin (1) - Camp1 / Con1
 * 3. Oportunidad verde de Superadmin (1) - Camp2 / Con1 
 * 4. Oportunidad verde de auxiliar (4) - Camp2 / Con2
 * 
 * INTERACCIONES
 * 1. Interacción atrasada de auxiliar - Opt1
 * 2. Interacción atrasada de Superadmin - Opt2
 * 3. Interacción hoy pendiente de Superadmin - Opt3
 * 4. Interacción hoy realizada de Superadmin - Opt3
 * 5. Interacción hoy realizada de Auxiliar - Opt4 
 */
class ReportesTest extends DuskTestCase
{  
     /**
     * Valida el comportamiento del KPI de interacciones atrasadas
     * en el dashboard para Superadmin y Auxiliar
     */
    public function testDashboardKPIAtrasadas()
    {
        //Solo superadmin
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/home');     
            $browser->whenAvailable('.bg-red', function ($box) use ($browser){
                $box->assertSee('Interacciones atrasadas'); 
                $box->assertSourceHas('<h3>1</h3>');
                $box->assertPresent('#enlaceAtrasadas');
                $box->click('#enlaceAtrasadas');
                $window = collect($browser->driver->getWindowHandles())->last();
                $browser->driver->switchTo()->window($window);
            });
            $browser->pause(500);
            $browser->assertSee('Prueba de interacción planeada atrasada de admin');
            $browser->assertSee('Mostrando registros del 1 al 1 de un total de 1 registro(s)');
        });

        //Solo auxiliar
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4));//Auxiliar
            $browser->visit('/home');     
            $browser->whenAvailable('.bg-red', function ($box) use ($browser){
                $box->assertSourceHas('<h3>1</h3>');
                $box->click('#enlaceAtrasadas');
                $window = collect($browser->driver->getWindowHandles())->last();
                $browser->driver->switchTo()->window($window);
            });
            $browser->pause(500);
            $browser->assertSee('Prueba de interacción planeada atrasada de auxiliar');
            $browser->assertSee('Mostrando registros del 1 al 1 de un total de 1 registro(s)');
        });
    } 

    /**
     * Valida el comportamiento del KPI de interacciones pendientes
     * en el dashboard para Superadmin y Auxiliar
     */
    public function testDashboardKPIPendientes()
    {
        //Solo superadmin
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/home');     
            $browser->whenAvailable('.bg-yellow', function ($box) use ($browser){
                $box->assertSee('Interacciones que vencerán hoy'); 
                $box->assertSourceHas('<h3>1</h3>');
                $box->assertPresent('#enlaceProximas');
                $box->click('#enlaceProximas');
                $window = collect($browser->driver->getWindowHandles())->last();
                $browser->driver->switchTo()->window($window);
            });
            $browser->pause(500);
            $browser->assertSee('Prueba de interacción planeada para hoy de admin');
            $browser->assertSee('Mostrando registros del 1 al 1 de un total de 1 registro(s)');
        });

        //Solo auxiliar
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4));//Auxiliar
            $browser->visit('/home');     
            $browser->whenAvailable('.bg-yellow', function ($box) use ($browser){
                $box->assertSourceHas('<h3>0</h3>');
                $box->click('#enlaceProximas');
                $window = collect($browser->driver->getWindowHandles())->last();
                $browser->driver->switchTo()->window($window);
            });
            $browser->pause(500);
            $browser->assertSee('Total registros: 0');
        });
    } 

    /**
     * Valida el comportamiento del KPI de interacciones realizadas
     * en el dashboard para Superadmin y Auxiliar
     */
    public function testDashboardKPIRealizadas()
    {
        //Solo superadmin
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/home');     
            $browser->whenAvailable('.bg-green', function ($box) use ($browser){
                $box->assertSee('Interacciones realizadas esta semana');
                if(date('D') == 'Mon') { //Si es lunes el día de ayer no es de la semana
                    $box->assertSourceHas('<h3>1/2</h3>');
                }else{
                    $box->assertSourceHas('<h3>1/3</h3>');
                }  
                $box->assertPresent('#enlaceRealizadas');
                $box->click('#enlaceRealizadas');
                $window = collect($browser->driver->getWindowHandles())->last();
                $browser->driver->switchTo()->window($window);
            });
            $browser->pause(500);
            $browser->assertSee('Prueba de interacción realizada hoy por admin');
            if(date('D') == 'Mon') { //Si es lunes el día de ayer no es de la semana
                $browser->assertSee('Mostrando registros del 1 al 2 de un total de 2 registro(s)');
            }else{
                $browser->assertSee('Mostrando registros del 1 al 3 de un total de 3 registro(s)');
            }
        });

        //Solo auxiliar
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4));//Auxiliar
            $browser->visit('/home');     
            $browser->whenAvailable('.bg-green', function ($box) use ($browser){
                if(date('D') == 'Mon') { //Si es lunes el día de ayer no es de la semana
                    $box->assertSourceHas('<h3>1/1</h3>');
                }else{
                    $box->assertSourceHas('<h3>1/2</h3>');
                }                
                $box->click('#enlaceRealizadas');
                $window = collect($browser->driver->getWindowHandles())->last();
                $browser->driver->switchTo()->window($window);
            });
            $browser->pause(500);
            $browser->assertSee('Prueba de interacción realizada hoy por auxiliar');
            if(date('D') == 'Mon') { //Si es lunes el día de ayer no es de la semana
                $browser->assertSee('Mostrando registros del 1 al 1 de un total de 1 registro(s)');
            }else{
                $browser->assertSee('Mostrando registros del 1 al 2 de un total de 2 registro(s)');
            }
        });
    } 

     /**
     * Valida el comportamiento de la tabla de actividades para hoy
     * en el dashboard para Superadmin y Auxiliar
     */
    public function testDashboardActicidadesHoy()
    {
        //Solo superadmin
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/home');     
            $browser->whenAvailable('#actividadesHoy_wrapper', function ($datatable){
                $datatable->assertSee('Prueba de interacción planeada para hoy de admin'); 
                $datatable->assertSee('Mostrando desde 1 hasta el 1 de 1 registro(s)'); 
                $datatable->assertPresent('td .btn-group .glyphicon-pencil');
            });
        });

        //Solo auxiliar
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4));//Auxiliar
            $browser->visit('/home');     
            $browser->whenAvailable('#actividadesHoy_wrapper', function ($datatable){
                $datatable->assertSee('Total registros: 0'); 
            });
        });
    }

    /**
     * Valida el comportamiento de la tabla de oportunidades
     * en el dashboard para Superadmin y Auxiliar
     */
    public function testDashboardOportunidades()
    {
        //Solo superadmin
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/home');     
            $browser->whenAvailable('#contactosActualizacion_wrapper', function ($datatable){
                $datatable->assertSee('Valentina Londoño Marin'); 
                $datatable->assertDontSee('Miriam Marin Arias'); 
                $datatable->assertSee('Mostrando desde 1 hasta el 2 de 2 registro(s)'); 
                $datatable->assertPresent('td .btn-group .glyphicon-comment');
                $datatable->assertPresent('td .btn-group .glyphicon-pencil');
            });
        });

        //Solo auxiliar
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4));//Auxiliar
            $browser->visit('/home');     
            $browser->whenAvailable('#contactosActualizacion_wrapper', function ($datatable){
                $datatable->assertDontSee('Valentina Londoño Marin'); 
                $datatable->assertSee('Miriam Marin Arias'); 
                $datatable->assertSee('Mostrando desde 1 hasta el 2 de 2 registro(s)'); 
            });
        });
    }

    /**
     * Valida el comportamiento del filtro en el Dashboard
     */
    public function testDashboardFiltro()
    {
        //Superadmin viendo lo de Administrador (sin nada)
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/home');
            $browser->click('#button-filtrar');   
            $browser->whenAvailable('#advanced_filter', function ($modal){
                $clase="App\Models\Admin\User";               
                $modal->asignarValorSelect2('#responsable_id',$clase,'name',2);
                $modal->press('Filtrar');
            }); 
            $browser->pause(500);
            $browser->assertSeeIn('.bg-red','0');
            $browser->assertSeeIn('.bg-yellow','0');
            $browser->assertSeeIn('.bg-green','0/0');
            $browser->assertSeeIn('#actividadesHoy_wrapper','Total registros: 0');
            $browser->assertSeeIn('#contactosActualizacion_wrapper','Total registros: 0');
        });

        //Superadmin viendo lo de Auxiliar
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));
            $browser->visit('/home');
            $browser->click('#button-filtrar');   
            $browser->whenAvailable('#advanced_filter', function ($modal){
                $clase="App\Models\Admin\User";               
                $modal->asignarValorSelect2('#responsable_id',$clase,'name',4);
                $modal->press('Filtrar');
            }); 
            $browser->pause(500);
            $browser->assertSeeIn('.bg-red','1');
            $browser->assertSeeIn('.bg-yellow','0');
            if(date('D') == 'Mon') { //Si es lunes el día de ayer no es de la semana
                $browser->assertSeeIn('.bg-green','1/1');
            }else{
                $browser->assertSeeIn('.bg-green','1/2');
            }
            $browser->assertSeeIn('#actividadesHoy_wrapper','Total registros: 0');
            $browser->assertSeeIn('#contactosActualizacion_wrapper','Mostrando desde 1 hasta el 2 de 2 registro(s)');

            //Filtrando además campaña
            $browser->click('#button-filtrar');   
            $browser->whenAvailable('#advanced_filter', function ($modal){
                $clase="App\Models\Campanias\Campania";               
                $modal->asignarValorSelect2('#campania_id',$clase,'nombre',2);
                $modal->press('Filtrar');
            }); 
            $browser->pause(500);
            $browser->assertSeeIn('.bg-red','0');
            $browser->assertSeeIn('.bg-yellow','0');
            $browser->assertSeeIn('.bg-green','1/1');
            $browser->assertSeeIn('#actividadesHoy_wrapper','Total registros: 0');
            $browser->assertSeeIn('#contactosActualizacion_wrapper','Mostrando desde 1 hasta el 1 de 1 registro(s)');
        });
    } 

    /**
     * Valida el comportamiento del reporte de Funnel
     */
    public function testReporteFunnel()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/reportes/funnel');
            //Campo requerido
            $browser->press('Filtrar');
            $browser->assertSee('Es necesario elegir una campaña');
            //Filtro con datos
            $clase="App\Models\Campanias\Campania";               
            $browser->asignarValorSelect2('#campania_id',$clase,'nombre',2);
            $clase="App\Models\Admin\User";               
            $browser->asignarValorSelect2('#responsable_id',$clase,'name',1);
            $browser->press('Filtrar');
            $browser->assertDontSee('Es necesario elegir una campaña');
            //Manualmente se validó el comportamiento de los datos y gráficos
        });
    } 

    /**
     * Valida el comportamiento del reporte de Interacciones
     */
    public function testReporteInteracciones()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/reportes/interacciones');
            //Campo requerido
            $browser->press('Filtrar');
            $browser->assertDontSee('Es necesario elegir una campaña');
            //Filtro con datos
            $clase="App\Models\Campanias\Campania";               
            $browser->asignarValorSelect2('#campania_id',$clase,'nombre',2);
            $clase="App\Models\Admin\User";               
            $browser->asignarValorSelect2('#responsable_id',$clase,'name',1);
            $browser->press('Filtrar');
            $browser->assertDontSee('Es necesario elegir una campaña');
            //Manualmente se validó el comportamiento de los datos y gráficos
        });
    } 
}
