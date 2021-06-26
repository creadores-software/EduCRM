<?php namespace Tests\Repositories;

use Spatie\Permission\Models\Permission;
use App\Repositories\Admin\PermissionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PermissionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->permissionRepo = \App::make(PermissionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_permission()
    {
        $permission = factory(Permission::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('admin.permissions.store');
        $response = $this->post($url, $permission); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoPermission = Permission::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($permission, $objetoPermission),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $permission); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_permission()
    {
        $permission = factory(Permission::class)->create();
        $dbPermission = $this->permissionRepo->find($permission->id);
        $dbPermission = $dbPermission->toArray();
        $this->assertTrue($this->sonDatosIguales($permission->toArray(),$dbPermission),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_permission()
    {
        //Se crea un objeto y se generan datos para edición  
        $permission = factory(Permission::class)->create();
        $fakePermission = factory(Permission::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('admin.permissions.update', $permission->id);
        $response = $this->patch($url,$fakePermission); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoPermission = Permission::find($permission->id);
        $this->assertTrue($this->sonDatosIguales($fakePermission, $objetoPermission->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_permission()
    {
        $permission = factory(Permission::class)->create();
        $resp = $this->permissionRepo->delete($permission->id);
        $this->assertNull(Permission::find($permission->id), 'El modelo no debe existir en BD.');
    }
}
