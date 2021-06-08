<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionRelacional;
use App\Repositories\Contactos\InformacionRelacionalRepository;
use App\Http\Requests\Contactos\CreateInformacionRelacionalRequest;
use App\Http\Requests\Contactos\UpdateInformacionRelacionalRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class InformacionRelacionalRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InformacionRelacionalRepository
     */
    protected $informacionRelacionalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionRelacionalRepo = \App::make(InformacionRelacionalRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->make()->toArray();

        $rules = (new CreateInformacionRelacionalRequest())->rules();
        $validator = Validator::make($informacionRelacional, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionRelacional = $this->informacionRelacionalRepo->create($informacionRelacional);
        $objetoInformacionRelacional = $objetoInformacionRelacional->toArray();

        $this->assertArrayHasKey('id', $objetoInformacionRelacional, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoInformacionRelacional['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(InformacionRelacional::find($objetoInformacionRelacional['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($informacionRelacional, $objetoInformacionRelacional,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($informacionRelacional, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->create();

        $dbInformacionRelacional = $this->informacionRelacionalRepo->find($informacionRelacional->id);

        $dbInformacionRelacional = $dbInformacionRelacional->toArray();
        $this->assertModelData($informacionRelacional->toArray(), $dbInformacionRelacional);
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->create();
        $fakeInformacionRelacional = factory(InformacionRelacional::class)->make()->toArray();

        $rules = (new UpdateInformacionRelacionalRequest())->rules();
        $validator = Validator::make($fakeInformacionRelacional, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionRelacional = $this->informacionRelacionalRepo->update($fakeInformacionRelacional, $informacionRelacional->id);

        $this->assertModelData($fakeInformacionRelacional, $objetoInformacionRelacional->toArray(),'El modelo no quedó con los datos editados.');
        $dbInformacionRelacional = $this->informacionRelacionalRepo->find($informacionRelacional->id);
        $this->assertModelData($fakeInformacionRelacional, $dbInformacionRelacional->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->create();

        $resp = $this->informacionRelacionalRepo->delete($informacionRelacional->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(InformacionRelacional::find($informacionRelacional->id), 'El modelo no debe existir en BD.');
    }
}
