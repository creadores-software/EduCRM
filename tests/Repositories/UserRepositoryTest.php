<?php namespace Tests\Repositories;

use App\Models\Admin\User;
use App\Repositories\Admin\UserRepository;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userRepo = \App::make(UserRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_user()
    {
        $user = factory(User::class)->make()->toArray();

        $rules = (new CreateUserRequest())->rules();
        $validator = Validator::make($user, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoUser = $this->userRepo->create($user);
        $objetoUser = $objetoUser->toArray();

        $this->assertArrayHasKey('id', $objetoUser, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoUser['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(User::find($objetoUser['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($user, $objetoUser,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($user, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_user()
    {
        $user = factory(User::class)->create();

        $dbUser = $this->userRepo->find($user->id);

        $dbUser = $dbUser->toArray();
        $this->assertModelData($user->toArray(), $dbUser);
    }

    /**
     * @test editar
     */
    public function test_editar_user()
    {
        $user = factory(User::class)->create();
        $fakeUser = factory(User::class)->make()->toArray();

        $rules = (new UpdateUserRequest())->rules();
        $validator = Validator::make($fakeUser, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoUser = $this->userRepo->update($fakeUser, $user->id);

        $this->assertModelData($fakeUser, $objetoUser->toArray(),'El modelo no quedó con los datos editados.');
        $dbUser = $this->userRepo->find($user->id);
        $this->assertModelData($fakeUser, $dbUser->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_user()
    {
        $user = factory(User::class)->create();

        $resp = $this->userRepo->delete($user->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(User::find($user->id), 'El modelo no debe existir en BD.');
    }
}
