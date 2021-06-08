<?php namespace Tests\Repositories;

use App\Models\Entidades\Entidad;
use App\Repositories\Entidades\EntidadRepository;
use App\Http\Requests\Entidades\CreateEntidadRequest;
use App\Http\Requests\Entidades\UpdateEntidadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EntidadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EntidadRepository
     */
    protected $entidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->entidadRepo = \App::make(EntidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_entidad()
    {
        $entidad = factory(Entidad::class)->make()->toArray();

        $rules = (new CreateEntidadRequest())->rules();
        $validator = Validator::make($entidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEntidad = $this->entidadRepo->create($entidad);
        $objetoEntidad = $objetoEntidad->toArray();

        $this->assertArrayHasKey('id', $objetoEntidad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEntidad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Entidad::find($objetoEntidad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($entidad, $objetoEntidad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($entidad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_entidad()
    {
        $entidad = factory(Entidad::class)->create();

        $dbEntidad = $this->entidadRepo->find($entidad->id);

        $dbEntidad = $dbEntidad->toArray();
        $this->assertModelData($entidad->toArray(), $dbEntidad);
    }

    /**
     * @test editar
     */
    public function test_editar_entidad()
    {
        $entidad = factory(Entidad::class)->create();
        $fakeEntidad = factory(Entidad::class)->make()->toArray();

        $rules = (new UpdateEntidadRequest())->rules();
        $validator = Validator::make($fakeEntidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEntidad = $this->entidadRepo->update($fakeEntidad, $entidad->id);

        $this->assertModelData($fakeEntidad, $objetoEntidad->toArray(),'El modelo no quedó con los datos editados.');
        $dbEntidad = $this->entidadRepo->find($entidad->id);
        $this->assertModelData($fakeEntidad, $dbEntidad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_entidad()
    {
        $entidad = factory(Entidad::class)->create();

        $resp = $this->entidadRepo->delete($entidad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Entidad::find($entidad->id), 'El modelo no debe existir en BD.');
    }
}
