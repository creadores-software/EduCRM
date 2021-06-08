<?php namespace Tests\Repositories;

use App\Models\Formaciones\FacultadBuyerPersona;
use App\Repositories\Formaciones\FacultadBuyerPersonaRepository;
use App\Http\Requests\Formaciones\CreateFacultadBuyerPersonaRequest;
use App\Http\Requests\Formaciones\UpdateFacultadBuyerPersonaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FacultadBuyerPersonaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var FacultadBuyerPersonaRepository
     */
    protected $facultadBuyerPersonaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->facultadBuyerPersonaRepo = \App::make(FacultadBuyerPersonaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_facultad_buyer_persona()
    {
        $facultadBuyerPersona = factory(FacultadBuyerPersona::class)->make()->toArray();

        $rules = (new CreateFacultadBuyerPersonaRequest())->rules();
        $validator = Validator::make($facultadBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFacultadBuyerPersona = $this->facultadBuyerPersonaRepo->create($facultadBuyerPersona);
        $objetoFacultadBuyerPersona = $objetoFacultadBuyerPersona->toArray();

        $this->assertArrayHasKey('id', $objetoFacultadBuyerPersona, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoFacultadBuyerPersona['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(FacultadBuyerPersona::find($objetoFacultadBuyerPersona['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($facultadBuyerPersona, $objetoFacultadBuyerPersona,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($facultadBuyerPersona, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_facultad_buyer_persona()
    {
        $facultadBuyerPersona = factory(FacultadBuyerPersona::class)->create();

        $dbFacultadBuyerPersona = $this->facultadBuyerPersonaRepo->find($facultadBuyerPersona->id);

        $dbFacultadBuyerPersona = $dbFacultadBuyerPersona->toArray();
        $this->assertModelData($facultadBuyerPersona->toArray(), $dbFacultadBuyerPersona);
    }

    /**
     * @test editar
     */
    public function test_editar_facultad_buyer_persona()
    {
        $facultadBuyerPersona = factory(FacultadBuyerPersona::class)->create();
        $fakeFacultadBuyerPersona = factory(FacultadBuyerPersona::class)->make()->toArray();

        $rules = (new UpdateFacultadBuyerPersonaRequest())->rules();
        $validator = Validator::make($fakeFacultadBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFacultadBuyerPersona = $this->facultadBuyerPersonaRepo->update($fakeFacultadBuyerPersona, $facultadBuyerPersona->id);

        $this->assertModelData($fakeFacultadBuyerPersona, $objetoFacultadBuyerPersona->toArray(),'El modelo no quedó con los datos editados.');
        $dbFacultadBuyerPersona = $this->facultadBuyerPersonaRepo->find($facultadBuyerPersona->id);
        $this->assertModelData($fakeFacultadBuyerPersona, $dbFacultadBuyerPersona->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_facultad_buyer_persona()
    {
        $facultadBuyerPersona = factory(FacultadBuyerPersona::class)->create();

        $resp = $this->facultadBuyerPersonaRepo->delete($facultadBuyerPersona->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(FacultadBuyerPersona::find($facultadBuyerPersona->id), 'El modelo no debe existir en BD.');
    }
}
