<?php namespace Tests\Repositories;

use App\Models\Parametros\BuyerPersona;
use App\Repositories\Parametros\BuyerPersonaRepository;
use App\Http\Requests\Parametros\CreateBuyerPersonaRequest;
use App\Http\Requests\Parametros\UpdateBuyerPersonaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class BuyerPersonaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var BuyerPersonaRepository
     */
    protected $buyerPersonaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->buyerPersonaRepo = \App::make(BuyerPersonaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->make()->toArray();

        $rules = (new CreateBuyerPersonaRequest())->rules();
        $validator = Validator::make($buyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoBuyerPersona = $this->buyerPersonaRepo->create($buyerPersona);
        $objetoBuyerPersona = $objetoBuyerPersona->toArray();

        $this->assertArrayHasKey('id', $objetoBuyerPersona, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoBuyerPersona['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(BuyerPersona::find($objetoBuyerPersona['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($buyerPersona, $objetoBuyerPersona,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($buyerPersona, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->create();

        $dbBuyerPersona = $this->buyerPersonaRepo->find($buyerPersona->id);

        $dbBuyerPersona = $dbBuyerPersona->toArray();
        $this->assertModelData($buyerPersona->toArray(), $dbBuyerPersona);
    }

    /**
     * @test editar
     */
    public function test_editar_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->create();
        $fakeBuyerPersona = factory(BuyerPersona::class)->make()->toArray();

        $rules = (new UpdateBuyerPersonaRequest())->rules();
        $validator = Validator::make($fakeBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoBuyerPersona = $this->buyerPersonaRepo->update($fakeBuyerPersona, $buyerPersona->id);

        $this->assertModelData($fakeBuyerPersona, $objetoBuyerPersona->toArray(),'El modelo no quedó con los datos editados.');
        $dbBuyerPersona = $this->buyerPersonaRepo->find($buyerPersona->id);
        $this->assertModelData($fakeBuyerPersona, $dbBuyerPersona->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->create();

        $resp = $this->buyerPersonaRepo->delete($buyerPersona->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(BuyerPersona::find($buyerPersona->id), 'El modelo no debe existir en BD.');
    }
}
