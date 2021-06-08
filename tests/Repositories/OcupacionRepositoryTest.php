<?php namespace Tests\Repositories;

use App\Models\Entidades\Ocupacion;
use App\Repositories\Entidades\OcupacionRepository;
use App\Http\Requests\Entidades\CreateOcupacionRequest;
use App\Http\Requests\Entidades\UpdateOcupacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class OcupacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OcupacionRepository
     */
    protected $ocupacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ocupacionRepo = \App::make(OcupacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->make()->toArray();

        $rules = (new CreateOcupacionRequest())->rules();
        $validator = Validator::make($ocupacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoOcupacion = $this->ocupacionRepo->create($ocupacion);
        $objetoOcupacion = $objetoOcupacion->toArray();

        $this->assertArrayHasKey('id', $objetoOcupacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoOcupacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Ocupacion::find($objetoOcupacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($ocupacion, $objetoOcupacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($ocupacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->create();

        $dbOcupacion = $this->ocupacionRepo->find($ocupacion->id);

        $dbOcupacion = $dbOcupacion->toArray();
        $this->assertModelData($ocupacion->toArray(), $dbOcupacion);
    }

    /**
     * @test editar
     */
    public function test_editar_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->create();
        $fakeOcupacion = factory(Ocupacion::class)->make()->toArray();

        $rules = (new UpdateOcupacionRequest())->rules();
        $validator = Validator::make($fakeOcupacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoOcupacion = $this->ocupacionRepo->update($fakeOcupacion, $ocupacion->id);

        $this->assertModelData($fakeOcupacion, $objetoOcupacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbOcupacion = $this->ocupacionRepo->find($ocupacion->id);
        $this->assertModelData($fakeOcupacion, $dbOcupacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->create();

        $resp = $this->ocupacionRepo->delete($ocupacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Ocupacion::find($ocupacion->id), 'El modelo no debe existir en BD.');
    }
}
