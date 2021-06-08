<?php namespace Tests\Repositories;

use App\Models\Formaciones\CampoEducacion;
use App\Repositories\Formaciones\CampoEducacionRepository;
use App\Http\Requests\Formaciones\CreateCampoEducacionRequest;
use App\Http\Requests\Formaciones\UpdateCampoEducacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CampoEducacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CampoEducacionRepository
     */
    protected $campoEducacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->campoEducacionRepo = \App::make(CampoEducacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->make()->toArray();

        $rules = (new CreateCampoEducacionRequest())->rules();
        $validator = Validator::make($campoEducacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCampoEducacion = $this->campoEducacionRepo->create($campoEducacion);
        $objetoCampoEducacion = $objetoCampoEducacion->toArray();

        $this->assertArrayHasKey('id', $objetoCampoEducacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoCampoEducacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(CampoEducacion::find($objetoCampoEducacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($campoEducacion, $objetoCampoEducacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($campoEducacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->create();

        $dbCampoEducacion = $this->campoEducacionRepo->find($campoEducacion->id);

        $dbCampoEducacion = $dbCampoEducacion->toArray();
        $this->assertModelData($campoEducacion->toArray(), $dbCampoEducacion);
    }

    /**
     * @test editar
     */
    public function test_editar_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->create();
        $fakeCampoEducacion = factory(CampoEducacion::class)->make()->toArray();

        $rules = (new UpdateCampoEducacionRequest())->rules();
        $validator = Validator::make($fakeCampoEducacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCampoEducacion = $this->campoEducacionRepo->update($fakeCampoEducacion, $campoEducacion->id);

        $this->assertModelData($fakeCampoEducacion, $objetoCampoEducacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbCampoEducacion = $this->campoEducacionRepo->find($campoEducacion->id);
        $this->assertModelData($fakeCampoEducacion, $dbCampoEducacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->create();

        $resp = $this->campoEducacionRepo->delete($campoEducacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(CampoEducacion::find($campoEducacion->id), 'El modelo no debe existir en BD.');
    }
}
