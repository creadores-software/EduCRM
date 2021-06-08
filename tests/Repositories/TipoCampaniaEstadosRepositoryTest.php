<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoCampaniaEstados;
use App\Repositories\Campanias\TipoCampaniaEstadosRepository;
use App\Http\Requests\Campanias\CreateTipoCampaniaEstadosRequest;
use App\Http\Requests\Campanias\UpdateTipoCampaniaEstadosRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoCampaniaEstadosRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoCampaniaEstadosRepository
     */
    protected $tipoCampaniaEstadosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoCampaniaEstadosRepo = \App::make(TipoCampaniaEstadosRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->make()->toArray();

        $rules = (new CreateTipoCampaniaEstadosRequest())->rules();
        $validator = Validator::make($tipoCampaniaEstados, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoCampaniaEstados = $this->tipoCampaniaEstadosRepo->create($tipoCampaniaEstados);
        $objetoTipoCampaniaEstados = $objetoTipoCampaniaEstados->toArray();

        $this->assertArrayHasKey('id', $objetoTipoCampaniaEstados, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoCampaniaEstados['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoCampaniaEstados::find($objetoTipoCampaniaEstados['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoCampaniaEstados, $objetoTipoCampaniaEstados,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoCampaniaEstados, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->create();

        $dbTipoCampaniaEstados = $this->tipoCampaniaEstadosRepo->find($tipoCampaniaEstados->id);

        $dbTipoCampaniaEstados = $dbTipoCampaniaEstados->toArray();
        $this->assertModelData($tipoCampaniaEstados->toArray(), $dbTipoCampaniaEstados);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->create();
        $fakeTipoCampaniaEstados = factory(TipoCampaniaEstados::class)->make()->toArray();

        $rules = (new UpdateTipoCampaniaEstadosRequest())->rules();
        $validator = Validator::make($fakeTipoCampaniaEstados, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoCampaniaEstados = $this->tipoCampaniaEstadosRepo->update($fakeTipoCampaniaEstados, $tipoCampaniaEstados->id);

        $this->assertModelData($fakeTipoCampaniaEstados, $objetoTipoCampaniaEstados->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoCampaniaEstados = $this->tipoCampaniaEstadosRepo->find($tipoCampaniaEstados->id);
        $this->assertModelData($fakeTipoCampaniaEstados, $dbTipoCampaniaEstados->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->create();

        $resp = $this->tipoCampaniaEstadosRepo->delete($tipoCampaniaEstados->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoCampaniaEstados::find($tipoCampaniaEstados->id), 'El modelo no debe existir en BD.');
    }
}
