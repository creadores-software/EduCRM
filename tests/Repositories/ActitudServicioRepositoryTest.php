<?php namespace Tests\Repositories;

use App\Models\Parametros\ActitudServicio;
use App\Repositories\Parametros\ActitudServicioRepository;
use App\Http\Requests\Parametros\CreateActitudServicioRequest;
use App\Http\Requests\Parametros\UpdateActitudServicioRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ActitudServicioRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ActitudServicioRepository
     */
    protected $actitudServicioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actitudServicioRepo = \App::make(ActitudServicioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->make()->toArray();

        $rules = (new CreateActitudServicioRequest())->rules();
        $validator = Validator::make($actitudServicio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoActitudServicio = $this->actitudServicioRepo->create($actitudServicio);
        $objetoActitudServicio = $objetoActitudServicio->toArray();

        $this->assertArrayHasKey('id', $objetoActitudServicio, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoActitudServicio['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(ActitudServicio::find($objetoActitudServicio['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($actitudServicio, $objetoActitudServicio,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($actitudServicio, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->create();

        $dbActitudServicio = $this->actitudServicioRepo->find($actitudServicio->id);

        $dbActitudServicio = $dbActitudServicio->toArray();
        $this->assertModelData($actitudServicio->toArray(), $dbActitudServicio);
    }

    /**
     * @test editar
     */
    public function test_editar_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->create();
        $fakeActitudServicio = factory(ActitudServicio::class)->make()->toArray();

        $rules = (new UpdateActitudServicioRequest())->rules();
        $validator = Validator::make($fakeActitudServicio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoActitudServicio = $this->actitudServicioRepo->update($fakeActitudServicio, $actitudServicio->id);

        $this->assertModelData($fakeActitudServicio, $objetoActitudServicio->toArray(),'El modelo no quedó con los datos editados.');
        $dbActitudServicio = $this->actitudServicioRepo->find($actitudServicio->id);
        $this->assertModelData($fakeActitudServicio, $dbActitudServicio->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->create();

        $resp = $this->actitudServicioRepo->delete($actitudServicio->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(ActitudServicio::find($actitudServicio->id), 'El modelo no debe existir en BD.');
    }
}
