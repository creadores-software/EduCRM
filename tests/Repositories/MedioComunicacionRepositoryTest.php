<?php namespace Tests\Repositories;

use App\Models\Parametros\MedioComunicacion;
use App\Repositories\Parametros\MedioComunicacionRepository;
use App\Http\Requests\Parametros\CreateMedioComunicacionRequest;
use App\Http\Requests\Parametros\UpdateMedioComunicacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class MedioComunicacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var MedioComunicacionRepository
     */
    protected $medioComunicacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->medioComunicacionRepo = \App::make(MedioComunicacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->make()->toArray();

        $rules = (new CreateMedioComunicacionRequest())->rules();
        $validator = Validator::make($medioComunicacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoMedioComunicacion = $this->medioComunicacionRepo->create($medioComunicacion);
        $objetoMedioComunicacion = $objetoMedioComunicacion->toArray();

        $this->assertArrayHasKey('id', $objetoMedioComunicacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoMedioComunicacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(MedioComunicacion::find($objetoMedioComunicacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($medioComunicacion, $objetoMedioComunicacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($medioComunicacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->create();

        $dbMedioComunicacion = $this->medioComunicacionRepo->find($medioComunicacion->id);

        $dbMedioComunicacion = $dbMedioComunicacion->toArray();
        $this->assertModelData($medioComunicacion->toArray(), $dbMedioComunicacion);
    }

    /**
     * @test editar
     */
    public function test_editar_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->create();
        $fakeMedioComunicacion = factory(MedioComunicacion::class)->make()->toArray();

        $rules = (new UpdateMedioComunicacionRequest())->rules();
        $validator = Validator::make($fakeMedioComunicacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoMedioComunicacion = $this->medioComunicacionRepo->update($fakeMedioComunicacion, $medioComunicacion->id);

        $this->assertModelData($fakeMedioComunicacion, $objetoMedioComunicacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbMedioComunicacion = $this->medioComunicacionRepo->find($medioComunicacion->id);
        $this->assertModelData($fakeMedioComunicacion, $dbMedioComunicacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->create();

        $resp = $this->medioComunicacionRepo->delete($medioComunicacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(MedioComunicacion::find($medioComunicacion->id), 'El modelo no debe existir en BD.');
    }
}
