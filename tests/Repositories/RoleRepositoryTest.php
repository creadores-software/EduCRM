<?php namespace Tests\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\Admin\RoleRepository;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RoleRepositoryTest extends TestCase
{
    use RefreshDatabase;

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

        $rules = (new CreateRoleRequest())->rules();
        $validator = Validator::make($role, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoRole = $this->roleRepo->create($role);
        $objetoRole = $objetoRole->toArray();

        $this->assertArrayHasKey('id', $objetoRole, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoRole['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Role::find($objetoRole['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($role, $objetoRole,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($role, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_role()
    {
        $role = factory(Role::class)->create();

        $dbRole = $this->roleRepo->find($role->id);

        $dbRole = $dbRole->toArray();
        $this->assertModelData($role->toArray(), $dbRole);
    }

    /**
     * @test editar
     */
    public function test_editar_role()
    {
        $role = factory(Role::class)->create();
        $fakeRole = factory(Role::class)->make()->toArray();

        $rules = (new UpdateRoleRequest())->rules();
        $validator = Validator::make($fakeRole, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoRole = $this->roleRepo->update($fakeRole, $role->id);

        $this->assertModelData($fakeRole, $objetoRole->toArray(),'El modelo no quedó con los datos editados.');
        $dbRole = $this->roleRepo->find($role->id);
        $this->assertModelData($fakeRole, $dbRole->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_role()
    {
        $role = factory(Role::class)->create();

        $resp = $this->roleRepo->delete($role->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Role::find($role->id), 'El modelo no debe existir en BD.');
    }
}
