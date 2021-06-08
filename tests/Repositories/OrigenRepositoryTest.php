<?php namespace Tests\Repositories;

use App\Models\Parametros\Origen;
use App\Repositories\Parametros\OrigenRepository;
use App\Http\Requests\Parametros\CreateOrigenRequest;
use App\Http\Requests\Parametros\UpdateOrigenRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class OrigenRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OrigenRepository
     */
    protected $origenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->origenRepo = \App::make(OrigenRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_origen()
    {
        $origen = factory(Origen::class)->make()->toArray();

        $rules = (new CreateOrigenRequest())->rules();
        $validator = Validator::make($origen, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoOrigen = $this->origenRepo->create($origen);
        $objetoOrigen = $objetoOrigen->toArray();

        $this->assertArrayHasKey('id', $objetoOrigen, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoOrigen['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Origen::find($objetoOrigen['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($origen, $objetoOrigen,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($origen, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_origen()
    {
        $origen = factory(Origen::class)->create();

        $dbOrigen = $this->origenRepo->find($origen->id);

        $dbOrigen = $dbOrigen->toArray();
        $this->assertModelData($origen->toArray(), $dbOrigen);
    }

    /**
     * @test editar
     */
    public function test_editar_origen()
    {
        $origen = factory(Origen::class)->create();
        $fakeOrigen = factory(Origen::class)->make()->toArray();

        $rules = (new UpdateOrigenRequest())->rules();
        $validator = Validator::make($fakeOrigen, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoOrigen = $this->origenRepo->update($fakeOrigen, $origen->id);

        $this->assertModelData($fakeOrigen, $objetoOrigen->toArray(),'El modelo no quedó con los datos editados.');
        $dbOrigen = $this->origenRepo->find($origen->id);
        $this->assertModelData($fakeOrigen, $dbOrigen->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_origen()
    {
        $origen = factory(Origen::class)->create();

        $resp = $this->origenRepo->delete($origen->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Origen::find($origen->id), 'El modelo no debe existir en BD.');
    }
}
