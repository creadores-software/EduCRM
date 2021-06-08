<?php namespace Tests\Repositories;

use App\Models\Formaciones\Modalidad;
use App\Repositories\Formaciones\ModalidadRepository;
use App\Http\Requests\Formaciones\CreateModalidadRequest;
use App\Http\Requests\Formaciones\UpdateModalidadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ModalidadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ModalidadRepository
     */
    protected $modalidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->modalidadRepo = \App::make(ModalidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_modalidad()
    {
        $modalidad = factory(Modalidad::class)->make()->toArray();

        $rules = (new CreateModalidadRequest())->rules();
        $validator = Validator::make($modalidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoModalidad = $this->modalidadRepo->create($modalidad);
        $objetoModalidad = $objetoModalidad->toArray();

        $this->assertArrayHasKey('id', $objetoModalidad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoModalidad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Modalidad::find($objetoModalidad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($modalidad, $objetoModalidad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($modalidad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_modalidad()
    {
        $modalidad = factory(Modalidad::class)->create();

        $dbModalidad = $this->modalidadRepo->find($modalidad->id);

        $dbModalidad = $dbModalidad->toArray();
        $this->assertModelData($modalidad->toArray(), $dbModalidad);
    }

    /**
     * @test editar
     */
    public function test_editar_modalidad()
    {
        $modalidad = factory(Modalidad::class)->create();
        $fakeModalidad = factory(Modalidad::class)->make()->toArray();

        $rules = (new UpdateModalidadRequest())->rules();
        $validator = Validator::make($fakeModalidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoModalidad = $this->modalidadRepo->update($fakeModalidad, $modalidad->id);

        $this->assertModelData($fakeModalidad, $objetoModalidad->toArray(),'El modelo no quedó con los datos editados.');
        $dbModalidad = $this->modalidadRepo->find($modalidad->id);
        $this->assertModelData($fakeModalidad, $dbModalidad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_modalidad()
    {
        $modalidad = factory(Modalidad::class)->create();

        $resp = $this->modalidadRepo->delete($modalidad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Modalidad::find($modalidad->id), 'El modelo no debe existir en BD.');
    }
}
