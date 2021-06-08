<?php namespace Tests\Repositories;

use App\Models\Parametros\EstatusLealtad;
use App\Repositories\Parametros\EstatusLealtadRepository;
use App\Http\Requests\Parametros\CreateEstatusLealtadRequest;
use App\Http\Requests\Parametros\UpdateEstatusLealtadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstatusLealtadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstatusLealtadRepository
     */
    protected $estatusLealtadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estatusLealtadRepo = \App::make(EstatusLealtadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->make()->toArray();

        $rules = (new CreateEstatusLealtadRequest())->rules();
        $validator = Validator::make($estatusLealtad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstatusLealtad = $this->estatusLealtadRepo->create($estatusLealtad);
        $objetoEstatusLealtad = $objetoEstatusLealtad->toArray();

        $this->assertArrayHasKey('id', $objetoEstatusLealtad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstatusLealtad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstatusLealtad::find($objetoEstatusLealtad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estatusLealtad, $objetoEstatusLealtad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estatusLealtad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->create();

        $dbEstatusLealtad = $this->estatusLealtadRepo->find($estatusLealtad->id);

        $dbEstatusLealtad = $dbEstatusLealtad->toArray();
        $this->assertModelData($estatusLealtad->toArray(), $dbEstatusLealtad);
    }

    /**
     * @test editar
     */
    public function test_editar_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->create();
        $fakeEstatusLealtad = factory(EstatusLealtad::class)->make()->toArray();

        $rules = (new UpdateEstatusLealtadRequest())->rules();
        $validator = Validator::make($fakeEstatusLealtad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstatusLealtad = $this->estatusLealtadRepo->update($fakeEstatusLealtad, $estatusLealtad->id);

        $this->assertModelData($fakeEstatusLealtad, $objetoEstatusLealtad->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstatusLealtad = $this->estatusLealtadRepo->find($estatusLealtad->id);
        $this->assertModelData($fakeEstatusLealtad, $dbEstatusLealtad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->create();

        $resp = $this->estatusLealtadRepo->delete($estatusLealtad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstatusLealtad::find($estatusLealtad->id), 'El modelo no debe existir en BD.');
    }
}
