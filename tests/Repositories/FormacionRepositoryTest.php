<?php namespace Tests\Repositories;

use App\Models\Formaciones\Formacion;
use App\Repositories\Formaciones\FormacionRepository;
use App\Http\Requests\Formaciones\CreateFormacionRequest;
use App\Http\Requests\Formaciones\UpdateFormacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FormacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var FormacionRepository
     */
    protected $formacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->formacionRepo = \App::make(FormacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_formacion()
    {
        $formacion = factory(Formacion::class)->make()->toArray();

        $rules = (new CreateFormacionRequest())->rules();
        $validator = Validator::make($formacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFormacion = $this->formacionRepo->create($formacion);
        $objetoFormacion = $objetoFormacion->toArray();

        $this->assertArrayHasKey('id', $objetoFormacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoFormacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Formacion::find($objetoFormacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($formacion, $objetoFormacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($formacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_formacion()
    {
        $formacion = factory(Formacion::class)->create();

        $dbFormacion = $this->formacionRepo->find($formacion->id);

        $dbFormacion = $dbFormacion->toArray();
        $this->assertModelData($formacion->toArray(), $dbFormacion);
    }

    /**
     * @test editar
     */
    public function test_editar_formacion()
    {
        $formacion = factory(Formacion::class)->create();
        $fakeFormacion = factory(Formacion::class)->make()->toArray();

        $rules = (new UpdateFormacionRequest())->rules();
        $validator = Validator::make($fakeFormacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFormacion = $this->formacionRepo->update($fakeFormacion, $formacion->id);

        $this->assertModelData($fakeFormacion, $objetoFormacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbFormacion = $this->formacionRepo->find($formacion->id);
        $this->assertModelData($fakeFormacion, $dbFormacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_formacion()
    {
        $formacion = factory(Formacion::class)->create();

        $resp = $this->formacionRepo->delete($formacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Formacion::find($formacion->id), 'El modelo no debe existir en BD.');
    }
}
