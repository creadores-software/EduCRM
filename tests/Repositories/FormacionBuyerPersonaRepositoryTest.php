<?php namespace Tests\Repositories;

use App\Models\Formaciones\FormacionBuyerPersona;
use App\Repositories\Formaciones\FormacionBuyerPersonaRepository;
use App\Http\Requests\Formaciones\CreateFormacionBuyerPersonaRequest;
use App\Http\Requests\Formaciones\UpdateFormacionBuyerPersonaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FormacionBuyerPersonaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var FormacionBuyerPersonaRepository
     */
    protected $formacionBuyerPersonaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->formacionBuyerPersonaRepo = \App::make(FormacionBuyerPersonaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_formacion_buyer_persona()
    {
        $formacionBuyerPersona = factory(FormacionBuyerPersona::class)->make()->toArray();

        $rules = (new CreateFormacionBuyerPersonaRequest())->rules();
        $validator = Validator::make($formacionBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFormacionBuyerPersona = $this->formacionBuyerPersonaRepo->create($formacionBuyerPersona);
        $objetoFormacionBuyerPersona = $objetoFormacionBuyerPersona->toArray();

        $this->assertArrayHasKey('id', $objetoFormacionBuyerPersona, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoFormacionBuyerPersona['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(FormacionBuyerPersona::find($objetoFormacionBuyerPersona['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($formacionBuyerPersona, $objetoFormacionBuyerPersona,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($formacionBuyerPersona, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_formacion_buyer_persona()
    {
        $formacionBuyerPersona = factory(FormacionBuyerPersona::class)->create();

        $dbFormacionBuyerPersona = $this->formacionBuyerPersonaRepo->find($formacionBuyerPersona->id);

        $dbFormacionBuyerPersona = $dbFormacionBuyerPersona->toArray();
        $this->assertModelData($formacionBuyerPersona->toArray(), $dbFormacionBuyerPersona);
    }

    /**
     * @test editar
     */
    public function test_editar_formacion_buyer_persona()
    {
        $formacionBuyerPersona = factory(FormacionBuyerPersona::class)->create();
        $fakeFormacionBuyerPersona = factory(FormacionBuyerPersona::class)->make()->toArray();

        $rules = (new UpdateFormacionBuyerPersonaRequest())->rules();
        $validator = Validator::make($fakeFormacionBuyerPersona, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFormacionBuyerPersona = $this->formacionBuyerPersonaRepo->update($fakeFormacionBuyerPersona, $formacionBuyerPersona->id);

        $this->assertModelData($fakeFormacionBuyerPersona, $objetoFormacionBuyerPersona->toArray(),'El modelo no quedó con los datos editados.');
        $dbFormacionBuyerPersona = $this->formacionBuyerPersonaRepo->find($formacionBuyerPersona->id);
        $this->assertModelData($fakeFormacionBuyerPersona, $dbFormacionBuyerPersona->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_formacion_buyer_persona()
    {
        $formacionBuyerPersona = factory(FormacionBuyerPersona::class)->create();

        $resp = $this->formacionBuyerPersonaRepo->delete($formacionBuyerPersona->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(FormacionBuyerPersona::find($formacionBuyerPersona->id), 'El modelo no debe existir en BD.');
    }
}
