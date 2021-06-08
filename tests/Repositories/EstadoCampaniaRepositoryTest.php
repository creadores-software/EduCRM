<?php namespace Tests\Repositories;

use App\Models\Campanias\EstadoCampania;
use App\Repositories\Campanias\EstadoCampaniaRepository;
use App\Http\Requests\Campanias\CreateEstadoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateEstadoCampaniaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstadoCampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstadoCampaniaRepository
     */
    protected $estadoCampaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoCampaniaRepo = \App::make(EstadoCampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->make()->toArray();

        $rules = (new CreateEstadoCampaniaRequest())->rules();
        $validator = Validator::make($estadoCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoCampania = $this->estadoCampaniaRepo->create($estadoCampania);
        $objetoEstadoCampania = $objetoEstadoCampania->toArray();

        $this->assertArrayHasKey('id', $objetoEstadoCampania, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstadoCampania['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstadoCampania::find($objetoEstadoCampania['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estadoCampania, $objetoEstadoCampania,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estadoCampania, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->create();

        $dbEstadoCampania = $this->estadoCampaniaRepo->find($estadoCampania->id);

        $dbEstadoCampania = $dbEstadoCampania->toArray();
        $this->assertModelData($estadoCampania->toArray(), $dbEstadoCampania);
    }

    /**
     * @test editar
     */
    public function test_editar_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->create();
        $fakeEstadoCampania = factory(EstadoCampania::class)->make()->toArray();

        $rules = (new UpdateEstadoCampaniaRequest())->rules();
        $validator = Validator::make($fakeEstadoCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoCampania = $this->estadoCampaniaRepo->update($fakeEstadoCampania, $estadoCampania->id);

        $this->assertModelData($fakeEstadoCampania, $objetoEstadoCampania->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstadoCampania = $this->estadoCampaniaRepo->find($estadoCampania->id);
        $this->assertModelData($fakeEstadoCampania, $dbEstadoCampania->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->create();

        $resp = $this->estadoCampaniaRepo->delete($estadoCampania->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstadoCampania::find($estadoCampania->id), 'El modelo no debe existir en BD.');
    }
}
