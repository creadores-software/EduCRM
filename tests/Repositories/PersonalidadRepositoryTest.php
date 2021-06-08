<?php namespace Tests\Repositories;

use App\Models\Parametros\Personalidad;
use App\Repositories\Parametros\PersonalidadRepository;
use App\Http\Requests\Parametros\CreatePersonalidadRequest;
use App\Http\Requests\Parametros\UpdatePersonalidadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PersonalidadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PersonalidadRepository
     */
    protected $personalidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->personalidadRepo = \App::make(PersonalidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_personalidad()
    {
        $personalidad = factory(Personalidad::class)->make()->toArray();

        $rules = (new CreatePersonalidadRequest())->rules();
        $validator = Validator::make($personalidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPersonalidad = $this->personalidadRepo->create($personalidad);
        $objetoPersonalidad = $objetoPersonalidad->toArray();

        $this->assertArrayHasKey('id', $objetoPersonalidad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPersonalidad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Personalidad::find($objetoPersonalidad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($personalidad, $objetoPersonalidad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($personalidad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_personalidad()
    {
        $personalidad = factory(Personalidad::class)->create();

        $dbPersonalidad = $this->personalidadRepo->find($personalidad->id);

        $dbPersonalidad = $dbPersonalidad->toArray();
        $this->assertModelData($personalidad->toArray(), $dbPersonalidad);
    }

    /**
     * @test editar
     */
    public function test_editar_personalidad()
    {
        $personalidad = factory(Personalidad::class)->create();
        $fakePersonalidad = factory(Personalidad::class)->make()->toArray();

        $rules = (new UpdatePersonalidadRequest())->rules();
        $validator = Validator::make($fakePersonalidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPersonalidad = $this->personalidadRepo->update($fakePersonalidad, $personalidad->id);

        $this->assertModelData($fakePersonalidad, $objetoPersonalidad->toArray(),'El modelo no quedó con los datos editados.');
        $dbPersonalidad = $this->personalidadRepo->find($personalidad->id);
        $this->assertModelData($fakePersonalidad, $dbPersonalidad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_personalidad()
    {
        $personalidad = factory(Personalidad::class)->create();

        $resp = $this->personalidadRepo->delete($personalidad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Personalidad::find($personalidad->id), 'El modelo no debe existir en BD.');
    }
}
