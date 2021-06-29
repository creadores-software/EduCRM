<?php

namespace Tests\Browser;

use App\Models\Admin\User;
use App\Models\Contactos\Contacto;
use App\Models\Parametros\Origen;
use App\Models\Parametros\Prefijo;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Contacto_InformacionRelacionalTest extends DuskTestCase
{  
    /**
     * Valida que permita la creación con todos los campos y muestre mensaje satisfactorio
     */
    public function testEdiciónCompletaExitosa()
    { 
        $contacto = factory(Contacto::class)->create();
        $info_relacional = factory(InformacionRelacional::class)->make()->toArray();
        $this->browse(function (Browser $browser) use ($contacto){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit("contactos/informacionesRelacionales/{$contacto->informacionRelacional->id}?idContacto={$contacto->id}");
            $browser->waitFor('.form-group'); 
            //Confirmar que por defecto tenga autoriza comunicación como si
            $browser->assertSourceHas(
            '<label for="autoriza_comunicacion">Autoriza Comunicación:</label>
            <p>Si</p>');
            Contacto::where('identificacion',$contacto['identificacion'])->delete();             
        });   
    }

    /**
     * Valida que permita editar y visualizar correctamente
     */
    public function testEdicionVistaExitosa()
    { 
        $this->browse(function (Browser $browser){ 
            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/1/edit');

            $browser->waitFor('.select2'); 
            $browser->type('nombres','Nuevo nombre');   

            $browser->press('Guardar');   
            $browser->waitFor('.alert-success'); 
            $browser->assertPathIs('/contactos/contactos/1'); 
            $browser->assertSee('Nuevo nombre');   
            $browser->assertSee('actualizado(a) satisfactoriamente');   
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
            $browser->visit('/contactos/contactos/');
            $browser->pause(1000);//petición ajax
            //Columnas en Datatable
            $browser->assertSee('Identificación'); 
            $browser->assertSee('Nombres');
            $browser->assertSee('Apellidos');
            $browser->assertSee('Celular');
            $browser->assertSee('Correo Personal');
            $browser->assertSee('Origen');
            $browser->assertSee('Activo');
            $browser->assertSee('ID');
            //Botones de acción
            $browser->waitFor('#dataTableBuilder'); 
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-eye-open');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-pencil');
            $browser->assertPresent('#dataTableBuilder td .btn-group .glyphicon-trash');
            //Buscadores inferiores
            $browser->assertPresent('#dataTableBuilder tfoot tr th input');
            //Botón superior
            $browser->assertPresent('#dataTableBuilder_wrapper .dt-buttons .buttons-export');
            $browser->assertSee('Búsqueda avanzada');
        });   
    }

    /**
     * Valida la opción de eliminar
     */
    public function testEliminar()
    { 
        $this->browse(function (Browser $browser){ 
            $contacto = factory(Contacto::class)->make()->toArray();
            $contacto['nombres']='Alejandra'; // Para que aparezca de primera
            Contacto::create($contacto);

            $browser->loginAs(User::find(1));//Superadmin
            $browser->visit('/contactos/contactos/');
            $browser->pause(1000);//petición ajax
            $browser->waitFor('#dataTableBuilder td .btn-group .glyphicon-trash'); 
            
            //Opción de eliminar contacto nuevo -> satisfactorio
            $browser->element('#dataTableBuilder tbody tr:nth-child(1) button.btn-danger')->click();
            $browser->acceptDialog();            
            $browser->waitFor('.alert-success'); 
            $browser->assertSee('eliminado(a) satisfactoriamente');

             //Opción de eliminar contacto antiguo con relaciones -> con error
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
            $browser->visit('/contactos/contactos/subirImportacion');
            $browser->assertSeeLink('Descargar plantilla');
            $browser->attach('archivo', 'tests/Browser/Files/plantilla_contactos.xlsx');
            $browser->press('Cargar importación'); 
            /** 
             * Teniendo en cuenta los datos ingresados en el archivo de prueba, 
             * deben cargar solo dos registros y salir los siguientes errores
             */
            $browser->waitFor('.alert-danger'); 
            $browser->assertSee('Error en la linea 2: El campo celular es requerido');
            $browser->assertSee('Error en la linea 2: El campo correo_personal debe ser un correo válido');
            $browser->assertSee('Error en la linea 2: El campo origen_id es requerido');
            $browser->assertSee('Error en la linea 5: No existe tipo de documento con este id');
            $browser->assertSee('Error en la linea 5: No existe prefijo con este id');
            $browser->assertSee('Error en la linea 5: No existe genero con este id');
            $browser->assertSee('Error en la linea 5: No existe estado civil con este id');
            $browser->assertSee('Se importaron sin error 2 registro(s)');
            //Se eliminan datos de prueba cargados
            Contacto::whereNotIn('id',[1,2])->delete();

        });   
    }
}
