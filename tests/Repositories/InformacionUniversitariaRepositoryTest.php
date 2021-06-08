<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionUniversitaria;
use App\Repositories\Contactos\InformacionUniversitariaRepository;
use App\Http\Requests\Contactos\CreateInformacionUniversitariaRequest;
use App\Http\Requests\Contactos\UpdateInformacionUniversitariaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class InformacionUniversitariaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InformacionUniversitariaRepository
     */
    protected $informacionUniversitariaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionUniversitariaRepo = \App::make(InformacionUniversitariaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->make()->toArray();

        $rules = (new CreateInformacionUniversitariaRequest())->rules();
        $validator = Validator::make($informacionUniversitaria, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionUniversitaria = $this->informacionUniversitariaRepo->create($informacionUniversitaria);
        $objetoInformacionUniversitaria = $objetoInformacionUniversitaria->toArray();

        $this->assertArrayHasKey('id', $objetoInformacionUniversitaria, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoInformacionUniversitaria['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(InformacionUniversitaria::find($objetoInformacionUniversitaria['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($informacionUniversitaria, $objetoInformacionUniversitaria,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($informacionUniversitaria, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->create();

        $dbInformacionUniversitaria = $this->informacionUniversitariaRepo->find($informacionUniversitaria->id);

        $dbInformacionUniversitaria = $dbInformacionUniversitaria->toArray();
        $this->assertModelData($informacionUniversitaria->toArray(), $dbInformacionUniversitaria);
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->create();
        $fakeInformacionUniversitaria = factory(InformacionUniversitaria::class)->make()->toArray();

        $rules = (new UpdateInformacionUniversitariaRequest())->rules();
        $validator = Validator::make($fakeInformacionUniversitaria, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionUniversitaria = $this->informacionUniversitariaRepo->update($fakeInformacionUniversitaria, $informacionUniversitaria->id);

        $this->assertModelData($fakeInformacionUniversitaria, $objetoInformacionUniversitaria->toArray(),'El modelo no quedó con los datos editados.');
        $dbInformacionUniversitaria = $this->informacionUniversitariaRepo->find($informacionUniversitaria->id);
        $this->assertModelData($fakeInformacionUniversitaria, $dbInformacionUniversitaria->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->create();

        $resp = $this->informacionUniversitariaRepo->delete($informacionUniversitaria->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(InformacionUniversitaria::find($informacionUniversitaria->id), 'El modelo no debe existir en BD.');
    }
}
