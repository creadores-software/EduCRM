<?php namespace Tests\Repositories;

use App\Models\Campanias\EstadoInteraccion;
use App\Repositories\Campanias\EstadoInteraccionRepository;
use App\Http\Requests\Campanias\CreateEstadoInteraccionRequest;
use App\Http\Requests\Campanias\UpdateEstadoInteraccionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstadoInteraccionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstadoInteraccionRepository
     */
    protected $estadoInteraccionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoInteraccionRepo = \App::make(EstadoInteraccionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->make()->toArray();

        $rules = (new CreateEstadoInteraccionRequest())->rules();
        $validator = Validator::make($estadoInteraccion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoInteraccion = $this->estadoInteraccionRepo->create($estadoInteraccion);
        $objetoEstadoInteraccion = $objetoEstadoInteraccion->toArray();

        $this->assertArrayHasKey('id', $objetoEstadoInteraccion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstadoInteraccion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstadoInteraccion::find($objetoEstadoInteraccion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estadoInteraccion, $objetoEstadoInteraccion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estadoInteraccion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->create();

        $dbEstadoInteraccion = $this->estadoInteraccionRepo->find($estadoInteraccion->id);

        $dbEstadoInteraccion = $dbEstadoInteraccion->toArray();
        $this->assertModelData($estadoInteraccion->toArray(), $dbEstadoInteraccion);
    }

    /**
     * @test editar
     */
    public function test_editar_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->create();
        $fakeEstadoInteraccion = factory(EstadoInteraccion::class)->make()->toArray();

        $rules = (new UpdateEstadoInteraccionRequest())->rules();
        $validator = Validator::make($fakeEstadoInteraccion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoInteraccion = $this->estadoInteraccionRepo->update($fakeEstadoInteraccion, $estadoInteraccion->id);

        $this->assertModelData($fakeEstadoInteraccion, $objetoEstadoInteraccion->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstadoInteraccion = $this->estadoInteraccionRepo->find($estadoInteraccion->id);
        $this->assertModelData($fakeEstadoInteraccion, $dbEstadoInteraccion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->create();

        $resp = $this->estadoInteraccionRepo->delete($estadoInteraccion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstadoInteraccion::find($estadoInteraccion->id), 'El modelo no debe existir en BD.');
    }
}
