<?php namespace Tests\Repositories;

use App\Models\Parametros\EstatusUsuario;
use App\Repositories\Parametros\EstatusUsuarioRepository;
use App\Http\Requests\Parametros\CreateEstatusUsuarioRequest;
use App\Http\Requests\Parametros\UpdateEstatusUsuarioRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstatusUsuarioRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstatusUsuarioRepository
     */
    protected $estatusUsuarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estatusUsuarioRepo = \App::make(EstatusUsuarioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->make()->toArray();

        $rules = (new CreateEstatusUsuarioRequest())->rules();
        $validator = Validator::make($estatusUsuario, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstatusUsuario = $this->estatusUsuarioRepo->create($estatusUsuario);
        $objetoEstatusUsuario = $objetoEstatusUsuario->toArray();

        $this->assertArrayHasKey('id', $objetoEstatusUsuario, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstatusUsuario['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstatusUsuario::find($objetoEstatusUsuario['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estatusUsuario, $objetoEstatusUsuario,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estatusUsuario, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->create();

        $dbEstatusUsuario = $this->estatusUsuarioRepo->find($estatusUsuario->id);

        $dbEstatusUsuario = $dbEstatusUsuario->toArray();
        $this->assertModelData($estatusUsuario->toArray(), $dbEstatusUsuario);
    }

    /**
     * @test editar
     */
    public function test_editar_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->create();
        $fakeEstatusUsuario = factory(EstatusUsuario::class)->make()->toArray();

        $rules = (new UpdateEstatusUsuarioRequest())->rules();
        $validator = Validator::make($fakeEstatusUsuario, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstatusUsuario = $this->estatusUsuarioRepo->update($fakeEstatusUsuario, $estatusUsuario->id);

        $this->assertModelData($fakeEstatusUsuario, $objetoEstatusUsuario->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstatusUsuario = $this->estatusUsuarioRepo->find($estatusUsuario->id);
        $this->assertModelData($fakeEstatusUsuario, $dbEstatusUsuario->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->create();

        $resp = $this->estatusUsuarioRepo->delete($estatusUsuario->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstatusUsuario::find($estatusUsuario->id), 'El modelo no debe existir en BD.');
    }
}
