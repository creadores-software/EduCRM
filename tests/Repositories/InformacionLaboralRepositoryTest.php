<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionLaboral;
use App\Repositories\Contactos\InformacionLaboralRepository;
use App\Http\Requests\Contactos\CreateInformacionLaboralRequest;
use App\Http\Requests\Contactos\UpdateInformacionLaboralRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class InformacionLaboralRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InformacionLaboralRepository
     */
    protected $informacionLaboralRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionLaboralRepo = \App::make(InformacionLaboralRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->make()->toArray();

        $rules = (new CreateInformacionLaboralRequest())->rules();
        $validator = Validator::make($informacionLaboral, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionLaboral = $this->informacionLaboralRepo->create($informacionLaboral);
        $objetoInformacionLaboral = $objetoInformacionLaboral->toArray();

        $this->assertArrayHasKey('id', $objetoInformacionLaboral, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoInformacionLaboral['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(InformacionLaboral::find($objetoInformacionLaboral['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($informacionLaboral, $objetoInformacionLaboral,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($informacionLaboral, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->create();

        $dbInformacionLaboral = $this->informacionLaboralRepo->find($informacionLaboral->id);

        $dbInformacionLaboral = $dbInformacionLaboral->toArray();
        $this->assertModelData($informacionLaboral->toArray(), $dbInformacionLaboral);
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->create();
        $fakeInformacionLaboral = factory(InformacionLaboral::class)->make()->toArray();

        $rules = (new UpdateInformacionLaboralRequest())->rules();
        $validator = Validator::make($fakeInformacionLaboral, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionLaboral = $this->informacionLaboralRepo->update($fakeInformacionLaboral, $informacionLaboral->id);

        $this->assertModelData($fakeInformacionLaboral, $objetoInformacionLaboral->toArray(),'El modelo no quedó con los datos editados.');
        $dbInformacionLaboral = $this->informacionLaboralRepo->find($informacionLaboral->id);
        $this->assertModelData($fakeInformacionLaboral, $dbInformacionLaboral->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->create();

        $resp = $this->informacionLaboralRepo->delete($informacionLaboral->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(InformacionLaboral::find($informacionLaboral->id), 'El modelo no debe existir en BD.');
    }
}
