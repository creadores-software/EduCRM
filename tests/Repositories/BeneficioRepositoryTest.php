<?php namespace Tests\Repositories;

use App\Models\Parametros\Beneficio;
use App\Repositories\Parametros\BeneficioRepository;
use App\Http\Requests\Parametros\CreateBeneficioRequest;
use App\Http\Requests\Parametros\UpdateBeneficioRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class BeneficioRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var BeneficioRepository
     */
    protected $beneficioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->beneficioRepo = \App::make(BeneficioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_beneficio()
    {
        $beneficio = factory(Beneficio::class)->make()->toArray();

        $rules = (new CreateBeneficioRequest())->rules();
        $validator = Validator::make($beneficio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoBeneficio = $this->beneficioRepo->create($beneficio);
        $objetoBeneficio = $objetoBeneficio->toArray();

        $this->assertArrayHasKey('id', $objetoBeneficio, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoBeneficio['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Beneficio::find($objetoBeneficio['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($beneficio, $objetoBeneficio,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($beneficio, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_beneficio()
    {
        $beneficio = factory(Beneficio::class)->create();

        $dbBeneficio = $this->beneficioRepo->find($beneficio->id);

        $dbBeneficio = $dbBeneficio->toArray();
        $this->assertModelData($beneficio->toArray(), $dbBeneficio);
    }

    /**
     * @test editar
     */
    public function test_editar_beneficio()
    {
        $beneficio = factory(Beneficio::class)->create();
        $fakeBeneficio = factory(Beneficio::class)->make()->toArray();

        $rules = (new UpdateBeneficioRequest())->rules();
        $validator = Validator::make($fakeBeneficio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoBeneficio = $this->beneficioRepo->update($fakeBeneficio, $beneficio->id);

        $this->assertModelData($fakeBeneficio, $objetoBeneficio->toArray(),'El modelo no quedó con los datos editados.');
        $dbBeneficio = $this->beneficioRepo->find($beneficio->id);
        $this->assertModelData($fakeBeneficio, $dbBeneficio->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_beneficio()
    {
        $beneficio = factory(Beneficio::class)->create();

        $resp = $this->beneficioRepo->delete($beneficio->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Beneficio::find($beneficio->id), 'El modelo no debe existir en BD.');
    }
}
