<?php namespace Tests\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\Admin\RoleRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RoleRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var RoleRepository
     */
    protected $roleRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->roleRepo = \App::make(RoleRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_role()
    {
        $role = factory(Role::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('admin.roles.store');
        $response = $this->post($url, $role); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoRole = Role::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($role, $objetoRole),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $role); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_role()
    {
        $role = factory(Role::class)->create();
        $dbRole = $this->roleRepo->find($role->id);
        $dbRole = $dbRole->toArray();
        $this->assertTrue($this->sonDatosIguales($role->toArray(),$dbRole),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_role()
    {
        //Se crea un objeto y se generan datos para edición  
        $role = factory(Role::class)->create();
        $fakeRole = factory(Role::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('admin.roles.update', $role->id);
        $response = $this->patch($url,$fakeRole); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoRole = Role::find($role->id);
        $this->assertTrue($this->sonDatosIguales($fakeRole, $objetoRole->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_role()
    {
        $role = factory(Role::class)->create();
        $resp = $this->roleRepo->delete($role->id);
        $this->assertNull(Role::find($role->id), 'El modelo no debe existir en BD.');
    }
}
