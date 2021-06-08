<?php namespace Tests\Repositories;

use App\Models\Formaciones\NivelFormacion;
use App\Repositories\Formaciones\NivelFormacionRepository;
use App\Http\Requests\Formaciones\CreateNivelFormacionRequest;
use App\Http\Requests\Formaciones\UpdateNivelFormacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class NivelFormacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var NivelFormacionRepository
     */
    protected $nivelFormacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nivelFormacionRepo = \App::make(NivelFormacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->make()->toArray();

        $rules = (new CreateNivelFormacionRequest())->rules();
        $validator = Validator::make($nivelFormacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoNivelFormacion = $this->nivelFormacionRepo->create($nivelFormacion);
        $objetoNivelFormacion = $objetoNivelFormacion->toArray();

        $this->assertArrayHasKey('id', $objetoNivelFormacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoNivelFormacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(NivelFormacion::find($objetoNivelFormacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($nivelFormacion, $objetoNivelFormacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($nivelFormacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->create();

        $dbNivelFormacion = $this->nivelFormacionRepo->find($nivelFormacion->id);

        $dbNivelFormacion = $dbNivelFormacion->toArray();
        $this->assertModelData($nivelFormacion->toArray(), $dbNivelFormacion);
    }

    /**
     * @test editar
     */
    public function test_editar_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->create();
        $fakeNivelFormacion = factory(NivelFormacion::class)->make()->toArray();

        $rules = (new UpdateNivelFormacionRequest())->rules();
        $validator = Validator::make($fakeNivelFormacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoNivelFormacion = $this->nivelFormacionRepo->update($fakeNivelFormacion, $nivelFormacion->id);

        $this->assertModelData($fakeNivelFormacion, $objetoNivelFormacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbNivelFormacion = $this->nivelFormacionRepo->find($nivelFormacion->id);
        $this->assertModelData($fakeNivelFormacion, $dbNivelFormacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->create();

        $resp = $this->nivelFormacionRepo->delete($nivelFormacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(NivelFormacion::find($nivelFormacion->id), 'El modelo no debe existir en BD.');
    }
}
