<?php namespace Tests\Repositories;

use App\Models\Parametros\EstiloVida;
use App\Repositories\Parametros\EstiloVidaRepository;
use App\Http\Requests\Parametros\CreateEstiloVidaRequest;
use App\Http\Requests\Parametros\UpdateEstiloVidaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstiloVidaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstiloVidaRepository
     */
    protected $estiloVidaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estiloVidaRepo = \App::make(EstiloVidaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->make()->toArray();

        $rules = (new CreateEstiloVidaRequest())->rules();
        $validator = Validator::make($estiloVida, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstiloVida = $this->estiloVidaRepo->create($estiloVida);
        $objetoEstiloVida = $objetoEstiloVida->toArray();

        $this->assertArrayHasKey('id', $objetoEstiloVida, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstiloVida['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstiloVida::find($objetoEstiloVida['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estiloVida, $objetoEstiloVida,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estiloVida, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->create();

        $dbEstiloVida = $this->estiloVidaRepo->find($estiloVida->id);

        $dbEstiloVida = $dbEstiloVida->toArray();
        $this->assertModelData($estiloVida->toArray(), $dbEstiloVida);
    }

    /**
     * @test editar
     */
    public function test_editar_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->create();
        $fakeEstiloVida = factory(EstiloVida::class)->make()->toArray();

        $rules = (new UpdateEstiloVidaRequest())->rules();
        $validator = Validator::make($fakeEstiloVida, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstiloVida = $this->estiloVidaRepo->update($fakeEstiloVida, $estiloVida->id);

        $this->assertModelData($fakeEstiloVida, $objetoEstiloVida->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstiloVida = $this->estiloVidaRepo->find($estiloVida->id);
        $this->assertModelData($fakeEstiloVida, $dbEstiloVida->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->create();

        $resp = $this->estiloVidaRepo->delete($estiloVida->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstiloVida::find($estiloVida->id), 'El modelo no debe existir en BD.');
    }
}
