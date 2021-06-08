<?php namespace Tests\Repositories;

use App\Models\Entidades\ActividadEconomica;
use App\Repositories\Entidades\ActividadEconomicaRepository;
use App\Http\Requests\Entidades\CreateActividadEconomicaRequest;
use App\Http\Requests\Entidades\UpdateActividadEconomicaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ActividadEconomicaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ActividadEconomicaRepository
     */
    protected $actividadEconomicaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actividadEconomicaRepo = \App::make(ActividadEconomicaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->make()->toArray();

        $rules = (new CreateActividadEconomicaRequest())->rules();
        $validator = Validator::make($actividadEconomica, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoActividadEconomica = $this->actividadEconomicaRepo->create($actividadEconomica);
        $objetoActividadEconomica = $objetoActividadEconomica->toArray();

        $this->assertArrayHasKey('id', $objetoActividadEconomica, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoActividadEconomica['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(ActividadEconomica::find($objetoActividadEconomica['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($actividadEconomica, $objetoActividadEconomica,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($actividadEconomica, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->create();

        $dbActividadEconomica = $this->actividadEconomicaRepo->find($actividadEconomica->id);

        $dbActividadEconomica = $dbActividadEconomica->toArray();
        $this->assertModelData($actividadEconomica->toArray(), $dbActividadEconomica);
    }

    /**
     * @test editar
     */
    public function test_editar_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->create();
        $fakeActividadEconomica = factory(ActividadEconomica::class)->make()->toArray();

        $rules = (new UpdateActividadEconomicaRequest())->rules();
        $validator = Validator::make($fakeActividadEconomica, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoActividadEconomica = $this->actividadEconomicaRepo->update($fakeActividadEconomica, $actividadEconomica->id);

        $this->assertModelData($fakeActividadEconomica, $objetoActividadEconomica->toArray(),'El modelo no quedó con los datos editados.');
        $dbActividadEconomica = $this->actividadEconomicaRepo->find($actividadEconomica->id);
        $this->assertModelData($fakeActividadEconomica, $dbActividadEconomica->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->create();

        $resp = $this->actividadEconomicaRepo->delete($actividadEconomica->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(ActividadEconomica::find($actividadEconomica->id), 'El modelo no debe existir en BD.');
    }
}
