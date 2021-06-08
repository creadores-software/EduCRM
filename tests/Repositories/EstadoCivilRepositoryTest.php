<?php namespace Tests\Repositories;

use App\Models\Parametros\EstadoCivil;
use App\Repositories\Parametros\EstadoCivilRepository;
use App\Http\Requests\Parametros\CreateEstadoCivilRequest;
use App\Http\Requests\Parametros\UpdateEstadoCivilRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EstadoCivilRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EstadoCivilRepository
     */
    protected $estadoCivilRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoCivilRepo = \App::make(EstadoCivilRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->make()->toArray();

        $rules = (new CreateEstadoCivilRequest())->rules();
        $validator = Validator::make($estadoCivil, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoCivil = $this->estadoCivilRepo->create($estadoCivil);
        $objetoEstadoCivil = $objetoEstadoCivil->toArray();

        $this->assertArrayHasKey('id', $objetoEstadoCivil, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEstadoCivil['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EstadoCivil::find($objetoEstadoCivil['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($estadoCivil, $objetoEstadoCivil,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($estadoCivil, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->create();

        $dbEstadoCivil = $this->estadoCivilRepo->find($estadoCivil->id);

        $dbEstadoCivil = $dbEstadoCivil->toArray();
        $this->assertModelData($estadoCivil->toArray(), $dbEstadoCivil);
    }

    /**
     * @test editar
     */
    public function test_editar_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->create();
        $fakeEstadoCivil = factory(EstadoCivil::class)->make()->toArray();

        $rules = (new UpdateEstadoCivilRequest())->rules();
        $validator = Validator::make($fakeEstadoCivil, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEstadoCivil = $this->estadoCivilRepo->update($fakeEstadoCivil, $estadoCivil->id);

        $this->assertModelData($fakeEstadoCivil, $objetoEstadoCivil->toArray(),'El modelo no quedó con los datos editados.');
        $dbEstadoCivil = $this->estadoCivilRepo->find($estadoCivil->id);
        $this->assertModelData($fakeEstadoCivil, $dbEstadoCivil->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->create();

        $resp = $this->estadoCivilRepo->delete($estadoCivil->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EstadoCivil::find($estadoCivil->id), 'El modelo no debe existir en BD.');
    }
}
