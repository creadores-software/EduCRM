<?php namespace Tests\Repositories;

use App\Models\Parametros\Generacion;
use App\Repositories\Parametros\GeneracionRepository;
use App\Http\Requests\Parametros\CreateGeneracionRequest;
use App\Http\Requests\Parametros\UpdateGeneracionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class GeneracionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var GeneracionRepository
     */
    protected $generacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->generacionRepo = \App::make(GeneracionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_generacion()
    {
        $generacion = factory(Generacion::class)->make()->toArray();

        $rules = (new CreateGeneracionRequest())->rules();
        $validator = Validator::make($generacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoGeneracion = $this->generacionRepo->create($generacion);
        $objetoGeneracion = $objetoGeneracion->toArray();

        $this->assertArrayHasKey('id', $objetoGeneracion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoGeneracion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Generacion::find($objetoGeneracion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($generacion, $objetoGeneracion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($generacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_generacion()
    {
        $generacion = factory(Generacion::class)->create();

        $dbGeneracion = $this->generacionRepo->find($generacion->id);

        $dbGeneracion = $dbGeneracion->toArray();
        $this->assertModelData($generacion->toArray(), $dbGeneracion);
    }

    /**
     * @test editar
     */
    public function test_editar_generacion()
    {
        $generacion = factory(Generacion::class)->create();
        $fakeGeneracion = factory(Generacion::class)->make()->toArray();

        $rules = (new UpdateGeneracionRequest())->rules();
        $validator = Validator::make($fakeGeneracion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoGeneracion = $this->generacionRepo->update($fakeGeneracion, $generacion->id);

        $this->assertModelData($fakeGeneracion, $objetoGeneracion->toArray(),'El modelo no quedó con los datos editados.');
        $dbGeneracion = $this->generacionRepo->find($generacion->id);
        $this->assertModelData($fakeGeneracion, $dbGeneracion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_generacion()
    {
        $generacion = factory(Generacion::class)->create();

        $resp = $this->generacionRepo->delete($generacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Generacion::find($generacion->id), 'El modelo no debe existir en BD.');
    }
}
