<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoCampania;
use App\Repositories\Campanias\TipoCampaniaRepository;
use App\Http\Requests\Campanias\CreateTipoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateTipoCampaniaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoCampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoCampaniaRepository
     */
    protected $tipoCampaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoCampaniaRepo = \App::make(TipoCampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->make()->toArray();

        $rules = (new CreateTipoCampaniaRequest())->rules();
        $validator = Validator::make($tipoCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoCampania = $this->tipoCampaniaRepo->create($tipoCampania);
        $objetoTipoCampania = $objetoTipoCampania->toArray();

        $this->assertArrayHasKey('id', $objetoTipoCampania, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoCampania['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoCampania::find($objetoTipoCampania['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoCampania, $objetoTipoCampania,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoCampania, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->create();

        $dbTipoCampania = $this->tipoCampaniaRepo->find($tipoCampania->id);

        $dbTipoCampania = $dbTipoCampania->toArray();
        $this->assertModelData($tipoCampania->toArray(), $dbTipoCampania);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->create();
        $fakeTipoCampania = factory(TipoCampania::class)->make()->toArray();

        $rules = (new UpdateTipoCampaniaRequest())->rules();
        $validator = Validator::make($fakeTipoCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoCampania = $this->tipoCampaniaRepo->update($fakeTipoCampania, $tipoCampania->id);

        $this->assertModelData($fakeTipoCampania, $objetoTipoCampania->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoCampania = $this->tipoCampaniaRepo->find($tipoCampania->id);
        $this->assertModelData($fakeTipoCampania, $dbTipoCampania->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->create();

        $resp = $this->tipoCampaniaRepo->delete($tipoCampania->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoCampania::find($tipoCampania->id), 'El modelo no debe existir en BD.');
    }
}
