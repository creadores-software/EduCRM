<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionEscolar;
use App\Repositories\Contactos\InformacionEscolarRepository;
use App\Http\Requests\Contactos\CreateInformacionEscolarRequest;
use App\Http\Requests\Contactos\UpdateInformacionEscolarRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class InformacionEscolarRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InformacionEscolarRepository
     */
    protected $informacionEscolarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionEscolarRepo = \App::make(InformacionEscolarRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->make()->toArray();

        $rules = (new CreateInformacionEscolarRequest())->rules();
        $validator = Validator::make($informacionEscolar, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionEscolar = $this->informacionEscolarRepo->create($informacionEscolar);
        $objetoInformacionEscolar = $objetoInformacionEscolar->toArray();

        $this->assertArrayHasKey('id', $objetoInformacionEscolar, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoInformacionEscolar['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(InformacionEscolar::find($objetoInformacionEscolar['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($informacionEscolar, $objetoInformacionEscolar,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($informacionEscolar, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->create();

        $dbInformacionEscolar = $this->informacionEscolarRepo->find($informacionEscolar->id);

        $dbInformacionEscolar = $dbInformacionEscolar->toArray();
        $this->assertModelData($informacionEscolar->toArray(), $dbInformacionEscolar);
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->create();
        $fakeInformacionEscolar = factory(InformacionEscolar::class)->make()->toArray();

        $rules = (new UpdateInformacionEscolarRequest())->rules();
        $validator = Validator::make($fakeInformacionEscolar, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInformacionEscolar = $this->informacionEscolarRepo->update($fakeInformacionEscolar, $informacionEscolar->id);

        $this->assertModelData($fakeInformacionEscolar, $objetoInformacionEscolar->toArray(),'El modelo no quedó con los datos editados.');
        $dbInformacionEscolar = $this->informacionEscolarRepo->find($informacionEscolar->id);
        $this->assertModelData($fakeInformacionEscolar, $dbInformacionEscolar->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->create();

        $resp = $this->informacionEscolarRepo->delete($informacionEscolar->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(InformacionEscolar::find($informacionEscolar->id), 'El modelo no debe existir en BD.');
    }
}
