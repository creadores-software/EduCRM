<?php namespace Tests\Repositories;

use App\Models\Contactos\PersonaBuyerPersona;
use App\Repositories\Contactos\PersonaBuyerPersonaRepository;
use App\Http\Requests\Contactos\CreatePersonaBuyerPersonaRequest;
use App\Http\Requests\Contactos\UpdatePersonaBuyerPersonaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PersonaBuyerPersonaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PersonaBuyerPersonaRepository
     */
    protected $personaBuyerPersonaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->personaBuyerPersonaRepo = \App::make(PersonaBuyerPersonaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_persona_buyer_persona()
    {
        $personaBuyerPersona = factory(PersonaBuyerPersona::class)->make()->toArray();

        $rules = (new CreatePersonaBuyerPersonaRequest())->rules();
        $validator = Validator::make($personaBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPersonaBuyerPersona = $this->personaBuyerPersonaRepo->create($personaBuyerPersona);
        $objetoPersonaBuyerPersona = $objetoPersonaBuyerPersona->toArray();

        $this->assertArrayHasKey('id', $objetoPersonaBuyerPersona, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPersonaBuyerPersona['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PersonaBuyerPersona::find($objetoPersonaBuyerPersona['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($personaBuyerPersona, $objetoPersonaBuyerPersona,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($personaBuyerPersona, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_persona_buyer_persona()
    {
        $personaBuyerPersona = factory(PersonaBuyerPersona::class)->create();

        $dbPersonaBuyerPersona = $this->personaBuyerPersonaRepo->find($personaBuyerPersona->id);

        $dbPersonaBuyerPersona = $dbPersonaBuyerPersona->toArray();
        $this->assertModelData($personaBuyerPersona->toArray(), $dbPersonaBuyerPersona);
    }

    /**
     * @test editar
     */
    public function test_editar_persona_buyer_persona()
    {
        $personaBuyerPersona = factory(PersonaBuyerPersona::class)->create();
        $fakePersonaBuyerPersona = factory(PersonaBuyerPersona::class)->make()->toArray();

        $rules = (new UpdatePersonaBuyerPersonaRequest())->rules();
        $validator = Validator::make($fakePersonaBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPersonaBuyerPersona = $this->personaBuyerPersonaRepo->update($fakePersonaBuyerPersona, $personaBuyerPersona->id);

        $this->assertModelData($fakePersonaBuyerPersona, $objetoPersonaBuyerPersona->toArray(),'El modelo no quedó con los datos editados.');
        $dbPersonaBuyerPersona = $this->personaBuyerPersonaRepo->find($personaBuyerPersona->id);
        $this->assertModelData($fakePersonaBuyerPersona, $dbPersonaBuyerPersona->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_persona_buyer_persona()
    {
        $personaBuyerPersona = factory(PersonaBuyerPersona::class)->create();

        $resp = $this->personaBuyerPersonaRepo->delete($personaBuyerPersona->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PersonaBuyerPersona::find($personaBuyerPersona->id), 'El modelo no debe existir en BD.');
    }
}
