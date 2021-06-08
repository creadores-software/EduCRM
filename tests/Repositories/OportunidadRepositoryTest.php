<?php namespace Tests\Repositories;

use App\Models\Campanias\Oportunidad;
use App\Repositories\Campanias\OportunidadRepository;
use App\Http\Requests\Campanias\CreateOportunidadRequest;
use App\Http\Requests\Campanias\UpdateOportunidadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class OportunidadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OportunidadRepository
     */
    protected $oportunidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->oportunidadRepo = \App::make(OportunidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->make()->toArray();

        $rules = (new CreateOportunidadRequest())->rules();
        $validator = Validator::make($oportunidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoOportunidad = $this->oportunidadRepo->create($oportunidad);
        $objetoOportunidad = $objetoOportunidad->toArray();

        $this->assertArrayHasKey('id', $objetoOportunidad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoOportunidad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Oportunidad::find($objetoOportunidad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($oportunidad, $objetoOportunidad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($oportunidad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->create();

        $dbOportunidad = $this->oportunidadRepo->find($oportunidad->id);

        $dbOportunidad = $dbOportunidad->toArray();
        $this->assertModelData($oportunidad->toArray(), $dbOportunidad);
    }

    /**
     * @test editar
     */
    public function test_editar_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->create();
        $fakeOportunidad = factory(Oportunidad::class)->make()->toArray();

        $rules = (new UpdateOportunidadRequest())->rules();
        $validator = Validator::make($fakeOportunidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoOportunidad = $this->oportunidadRepo->update($fakeOportunidad, $oportunidad->id);

        $this->assertModelData($fakeOportunidad, $objetoOportunidad->toArray(),'El modelo no quedó con los datos editados.');
        $dbOportunidad = $this->oportunidadRepo->find($oportunidad->id);
        $this->assertModelData($fakeOportunidad, $dbOportunidad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->create();

        $resp = $this->oportunidadRepo->delete($oportunidad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Oportunidad::find($oportunidad->id), 'El modelo no debe existir en BD.');
    }
}
