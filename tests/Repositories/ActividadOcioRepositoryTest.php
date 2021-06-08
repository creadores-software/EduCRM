<?php namespace Tests\Repositories;

use App\Models\Parametros\ActividadOcio;
use App\Repositories\Parametros\ActividadOcioRepository;
use App\Http\Requests\Parametros\CreateActividadOcioRequest;
use App\Http\Requests\Parametros\UpdateActividadOcioRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ActividadOcioRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ActividadOcioRepository
     */
    protected $actividadOcioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actividadOcioRepo = \App::make(ActividadOcioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->make()->toArray();

        $rules = (new CreateActividadOcioRequest())->rules();
        $validator = Validator::make($actividadOcio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoActividadOcio = $this->actividadOcioRepo->create($actividadOcio);
        $objetoActividadOcio = $objetoActividadOcio->toArray();

        $this->assertArrayHasKey('id', $objetoActividadOcio, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoActividadOcio['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(ActividadOcio::find($objetoActividadOcio['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($actividadOcio, $objetoActividadOcio,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($actividadOcio, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->create();

        $dbActividadOcio = $this->actividadOcioRepo->find($actividadOcio->id);

        $dbActividadOcio = $dbActividadOcio->toArray();
        $this->assertModelData($actividadOcio->toArray(), $dbActividadOcio);
    }

    /**
     * @test editar
     */
    public function test_editar_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->create();
        $fakeActividadOcio = factory(ActividadOcio::class)->make()->toArray();

        $rules = (new UpdateActividadOcioRequest())->rules();
        $validator = Validator::make($fakeActividadOcio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoActividadOcio = $this->actividadOcioRepo->update($fakeActividadOcio, $actividadOcio->id);

        $this->assertModelData($fakeActividadOcio, $objetoActividadOcio->toArray(),'El modelo no quedó con los datos editados.');
        $dbActividadOcio = $this->actividadOcioRepo->find($actividadOcio->id);
        $this->assertModelData($fakeActividadOcio, $dbActividadOcio->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->create();

        $resp = $this->actividadOcioRepo->delete($actividadOcio->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(ActividadOcio::find($actividadOcio->id), 'El modelo no debe existir en BD.');
    }
}
