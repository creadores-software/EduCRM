<?php namespace Tests\Repositories;

use App\Models\Parametros\EstadoDisposicion;
use App\Repositories\Parametros\EstadoDisposicionRepository;
use App\Http\Requests\Parametros\CreateEstadoDisposicionRequest;
use App\Http\Requests\Parametros\UpdateEstadoDisposicionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstadoDisposicionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstadoDisposicionRepository
     */
    protected $estadoDisposicionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoDisposicionRepo = \App::make(EstadoDisposicionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->make()->toArray();

        $rules = (new CreateEstadoDisposicionRequest())->rules();
        $validator = Validator::make($estadoDisposicion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoDisposicion = $this->estadoDisposicionRepo->create($estadoDisposicion);
        $objetoEstadoDisposicion = $objetoEstadoDisposicion->toArray();

        $this->assertArrayHasKey('id', $objetoEstadoDisposicion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstadoDisposicion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstadoDisposicion::find($objetoEstadoDisposicion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estadoDisposicion, $objetoEstadoDisposicion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estadoDisposicion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->create();

        $dbEstadoDisposicion = $this->estadoDisposicionRepo->find($estadoDisposicion->id);

        $dbEstadoDisposicion = $dbEstadoDisposicion->toArray();
        $this->assertModelData($estadoDisposicion->toArray(), $dbEstadoDisposicion);
    }

    /**
     * @test editar
     */
    public function test_editar_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->create();
        $fakeEstadoDisposicion = factory(EstadoDisposicion::class)->make()->toArray();

        $rules = (new UpdateEstadoDisposicionRequest())->rules();
        $validator = Validator::make($fakeEstadoDisposicion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoDisposicion = $this->estadoDisposicionRepo->update($fakeEstadoDisposicion, $estadoDisposicion->id);

        $this->assertModelData($fakeEstadoDisposicion, $objetoEstadoDisposicion->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstadoDisposicion = $this->estadoDisposicionRepo->find($estadoDisposicion->id);
        $this->assertModelData($fakeEstadoDisposicion, $dbEstadoDisposicion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->create();

        $resp = $this->estadoDisposicionRepo->delete($estadoDisposicion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstadoDisposicion::find($estadoDisposicion->id), 'El modelo no debe existir en BD.');
    }
}
