<?php namespace Tests\Repositories;

use App\Models\Contactos\PreferenciaFormacion;
use App\Repositories\Contactos\PreferenciaFormacionRepository;
use App\Http\Requests\Contactos\CreatePreferenciaFormacionRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaFormacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PreferenciaFormacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PreferenciaFormacionRepository
     */
    protected $preferenciaFormacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->preferenciaFormacionRepo = \App::make(PreferenciaFormacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_preferencia_formacion()
    {
        $preferenciaFormacion = factory(PreferenciaFormacion::class)->make()->toArray();

        $rules = (new CreatePreferenciaFormacionRequest())->rules();
        $validator = Validator::make($preferenciaFormacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaFormacion = $this->preferenciaFormacionRepo->create($preferenciaFormacion);
        $objetoPreferenciaFormacion = $objetoPreferenciaFormacion->toArray();

        $this->assertArrayHasKey('id', $objetoPreferenciaFormacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPreferenciaFormacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PreferenciaFormacion::find($objetoPreferenciaFormacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($preferenciaFormacion, $objetoPreferenciaFormacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($preferenciaFormacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_preferencia_formacion()
    {
        $preferenciaFormacion = factory(PreferenciaFormacion::class)->create();

        $dbPreferenciaFormacion = $this->preferenciaFormacionRepo->find($preferenciaFormacion->id);

        $dbPreferenciaFormacion = $dbPreferenciaFormacion->toArray();
        $this->assertModelData($preferenciaFormacion->toArray(), $dbPreferenciaFormacion);
    }

    /**
     * @test editar
     */
    public function test_editar_preferencia_formacion()
    {
        $preferenciaFormacion = factory(PreferenciaFormacion::class)->create();
        $fakePreferenciaFormacion = factory(PreferenciaFormacion::class)->make()->toArray();

        $rules = (new UpdatePreferenciaFormacionRequest())->rules();
        $validator = Validator::make($fakePreferenciaFormacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaFormacion = $this->preferenciaFormacionRepo->update($fakePreferenciaFormacion, $preferenciaFormacion->id);

        $this->assertModelData($fakePreferenciaFormacion, $objetoPreferenciaFormacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbPreferenciaFormacion = $this->preferenciaFormacionRepo->find($preferenciaFormacion->id);
        $this->assertModelData($fakePreferenciaFormacion, $dbPreferenciaFormacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_preferencia_formacion()
    {
        $preferenciaFormacion = factory(PreferenciaFormacion::class)->create();

        $resp = $this->preferenciaFormacionRepo->delete($preferenciaFormacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PreferenciaFormacion::find($preferenciaFormacion->id), 'El modelo no debe existir en BD.');
    }
}
