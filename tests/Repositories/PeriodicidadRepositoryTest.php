<?php namespace Tests\Repositories;

use App\Models\Formaciones\Periodicidad;
use App\Repositories\Formaciones\PeriodicidadRepository;
use App\Http\Requests\Formaciones\CreatePeriodicidadRequest;
use App\Http\Requests\Formaciones\UpdatePeriodicidadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PeriodicidadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PeriodicidadRepository
     */
    protected $periodicidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->periodicidadRepo = \App::make(PeriodicidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->make()->toArray();

        $rules = (new CreatePeriodicidadRequest())->rules();
        $validator = Validator::make($periodicidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPeriodicidad = $this->periodicidadRepo->create($periodicidad);
        $objetoPeriodicidad = $objetoPeriodicidad->toArray();

        $this->assertArrayHasKey('id', $objetoPeriodicidad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPeriodicidad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Periodicidad::find($objetoPeriodicidad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($periodicidad, $objetoPeriodicidad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($periodicidad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->create();

        $dbPeriodicidad = $this->periodicidadRepo->find($periodicidad->id);

        $dbPeriodicidad = $dbPeriodicidad->toArray();
        $this->assertModelData($periodicidad->toArray(), $dbPeriodicidad);
    }

    /**
     * @test editar
     */
    public function test_editar_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->create();
        $fakePeriodicidad = factory(Periodicidad::class)->make()->toArray();

        $rules = (new UpdatePeriodicidadRequest())->rules();
        $validator = Validator::make($fakePeriodicidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPeriodicidad = $this->periodicidadRepo->update($fakePeriodicidad, $periodicidad->id);

        $this->assertModelData($fakePeriodicidad, $objetoPeriodicidad->toArray(),'El modelo no quedó con los datos editados.');
        $dbPeriodicidad = $this->periodicidadRepo->find($periodicidad->id);
        $this->assertModelData($fakePeriodicidad, $dbPeriodicidad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->create();

        $resp = $this->periodicidadRepo->delete($periodicidad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Periodicidad::find($periodicidad->id), 'El modelo no debe existir en BD.');
    }
}
