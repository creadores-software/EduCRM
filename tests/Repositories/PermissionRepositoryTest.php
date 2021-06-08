<?php namespace Tests\Repositories;

use Spatie\Permission\Models\Permission;
use App\Repositories\Admin\PermissionRepository;
use App\Http\Requests\Admin\CreatePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PermissionRepositoryTest extends TestCase
{
    use RefreshDatabase;

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

        $rules = (new CreatePermissionRequest())->rules();
        $validator = Validator::make($permission, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPermission = $this->permissionRepo->create($permission);
        $objetoPermission = $objetoPermission->toArray();

        $this->assertArrayHasKey('id', $objetoPermission, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPermission['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Permission::find($objetoPermission['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($permission, $objetoPermission,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($permission, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_permission()
    {
        $permission = factory(Permission::class)->create();

        $dbPermission = $this->permissionRepo->find($permission->id);

        $dbPermission = $dbPermission->toArray();
        $this->assertModelData($permission->toArray(), $dbPermission);
    }

    /**
     * @test editar
     */
    public function test_editar_permission()
    {
        $permission = factory(Permission::class)->create();
        $fakePermission = factory(Permission::class)->make()->toArray();

        $rules = (new UpdatePermissionRequest())->rules();
        $validator = Validator::make($fakePermission, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPermission = $this->permissionRepo->update($fakePermission, $permission->id);

        $this->assertModelData($fakePermission, $objetoPermission->toArray(),'El modelo no quedó con los datos editados.');
        $dbPermission = $this->permissionRepo->find($permission->id);
        $this->assertModelData($fakePermission, $dbPermission->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_permission()
    {
        $permission = factory(Permission::class)->create();

        $resp = $this->permissionRepo->delete($permission->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Permission::find($permission->id), 'El modelo no debe existir en BD.');
    }
}
